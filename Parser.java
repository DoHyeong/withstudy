import java.io.*;
import java.net.URL;
import java.net.URLConnection;
import java.sql.*;

import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathFactory;

import org.w3c.dom.Document;
import org.xml.sax.InputSource;
public class Parser {
	public static void main(String[] args) throws Exception {
		String urls = "jdbc:mysql://localhost:3306/withstudy?useUnicode=true&characterEncoding=euc_kr";
        String uid = "admin";
        String upw = "ohdumak";
		Class.forName("com.mysql.jdbc.Driver");
		Connection con = DriverManager.getConnection(urls,uid,upw);
		
		String query;
		Statement  stmt = con.createStatement();
        
		stmt.execute("SET CHARACTER SET euckr");
		stmt.execute("set names euckr");
		
		stmt.close();
		
		Statement st = con.createStatement();
		ResultSet rs = st.executeQuery("select snumber,isbn from book");
		while(rs.next()) {
            Integer snumber = rs.getInt("snumber");
			String strs = "";
			int x = rs.getString("isbn").length();
			String tmp = rs.getString("isbn");
			boolean tr=false;
			for(int i=0;i<x;i++) {
				if(tr) {
					strs += tmp.charAt(i);
				} else if(tmp.charAt(i) == ' ') {
					tr=true;
				}
				
			}
			String paramStr = "barcode=" + strs;
			System.out.println(strs);
			URL url = new URL("http://kyobobook.co.kr/product/detailViewKor.laf");
			URLConnection urlConnection = url.openConnection();
			urlConnection.setDoOutput(true);
            
			//파라미터 전달
			OutputStreamWriter wr = new OutputStreamWriter(urlConnection.getOutputStream());
			wr.write(paramStr);
			wr.flush();
			
			
			InputStream iss = urlConnection.getInputStream();
			// 엔코딩
			InputStreamReader isr = new InputStreamReader(iss, "euc-kr");
			BufferedReader br = new BufferedReader(isr);
            
			StringBuffer resultStr = new StringBuffer();
			String temp;
			boolean tsr=false;
			while((temp=br.readLine()) != null){
				if(tsr) {
					if(temp.trim().equalsIgnoreCase("</div>")) {
						break;
					}
					resultStr.append(temp);
				} else if(temp.trim().equalsIgnoreCase("<div class=\"book_content\">")) {
					tsr=true;
				}
				
			}
			String xml = resultStr.toString();
			//System.out.println(xml);
			int size_xml = xml.length();
			int big_ch=1;
			String big_chs="";
			for(int i=0;i<size_xml;i++) {
				if(xml.charAt(i)=='<' && xml.charAt(i+1)=='b' && xml.charAt(i+2)=='>') {
					System.out.print("대단원 - ");
					int j=i+3;
					for(j=i+3;j<size_xml;j++) {
						if(xml.charAt(j)=='<' && xml.charAt(j+1)=='/' && xml.charAt(j+2)=='b' && xml.charAt(j+3) == '>') {
							big_ch++;
							big_chs="";
							break;
						}
						if(xml.charAt(j) != '\t') big_chs += xml.charAt(j);
					}
					//insert into withstudy_book_index(null, ?, ?, 0, ?, 0);
					// book_id big_id title
					PreparedStatement prb = con.prepareStatement("insert into withstudy_book_index values(null, ?, ?, 0, ?, 0)");
					prb.setInt(1,snumber);
					prb.setInt(2,big_ch);
					prb.setString(3,big_chs);
					prb.executeUpdate();
					prb.close();
					j+=4;
					System.out.println();
					int sm_ch=1;
					String sm_chs = "";
					for(;j<size_xml;j++) {
						
						if(xml.charAt(j)=='<' && xml.charAt(j+1)=='b' && xml.charAt(j+2)=='r' && xml.charAt(j+3) == '>') {
							j=j+3;
							System.out.println();
							sm_ch++;
							continue;
						}
						if(xml.charAt(j)=='<' && xml.charAt(j+1)=='b' && xml.charAt(j+2)=='>') {
							System.out.println();
							i=j-1;
							break;
						}
						if(xml.charAt(j) != '\t') sm_chs += xml.charAt(j);
					}
					PreparedStatement prb2 = con.prepareStatement("insert into withstudy_book_index values(null, ?, ?, ?, ?, 0)");
					prb2.setInt(1,snumber);
					prb2.setInt(2,big_ch);
					prb2.setInt(3,sm_ch);
					prb2.setString(4,big_chs);
					prb2.executeUpdate();
					prb2.close();
					
				} else {
					
                    if(xml.charAt(i)=='<' && xml.charAt(i+1)=='b' && xml.charAt(i+2)=='r' && xml.charAt(i+3) == '>') {
                        PreparedStatement prb3 = con.prepareStatement("insert into withstudy_book_index values(null, ?, ?, 0, ?, 0)");
                        prb3.setInt(1,snumber);
                        prb3.setInt(2,big_ch);
                        prb3.setString(3,big_chs);
                        prb3.executeUpdate();
                        prb3.close();
                        i=i+3;
                        big_ch++;
                        big_chs="";
                        System.out.println();
                        continue;
                    }
                    if(xml.charAt(i) != '\t') big_chs+=xml.charAt(i);
					
				}
			}
			System.out.println();
            //	InputSource is = new InputSource(new StringReader(xml));
            //	Document document = DocumentBuilderFactory.newInstance().newDocumentBuilder().parse(is);
            //	XPath xpath = XPathFactory.newInstance().newXPath();
			
			
			
			br.close();
			isr.close();
			iss.close();
			wr.close();
		}
		rs.close();
		st.close();
		con.close();
		
	}
}
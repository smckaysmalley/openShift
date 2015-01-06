<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
  <xsl:template match="/">
    <html>
      <body style="background-color:lightGrey">
        <h2>Student List</h2>
        <xsl:for-each select="studentList">
          <table border="1" style="text-align:left; background-color:#CCCC99;
                                   border-radius:15px;">
            <tr bgcolor="grey">
              <th>First Name</th>
              <th>Last Name</th>
              <th>City</th>
              <th>State</th>
              <th>School</th>
              <th>Department</th>
              <th>Major</th>
            </tr>
            <xsl:for-each select="student">
              <tr>
                <xsl:for-each select="name">
                  <td><xsl:value-of select="first"/></td>            
                  <td><xsl:value-of select="last"/></td>
                </xsl:for-each>
                <xsl:for-each select="location">
                  <td><xsl:value-of select="city"/></td>
                  <td><xsl:value-of select="state"/></td>
                </xsl:for-each>
                <xsl:for-each select="college">
                  <td><xsl:value-of select="@name"/></td>
                  <xsl:for-each select="department">
                    <td><xsl:value-of select="@name"/></td>
                      <td style="text-align:right"><xsl:value-of select="major"/>
                        <xsl:for-each select="major">
                          - I.D. =<xsl:value-of select="@id"/>
                        </xsl:for-each>
                      </td>
                  </xsl:for-each>
                </xsl:for-each>
              </tr>
            </xsl:for-each>
          </table>
        </xsl:for-each>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
 

<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>
      <body>
        <xsl:for-each select="bsa/council">
          <h2 style="color:maroon"><xsl:value-of select="@name"/></h2>
          <xsl:for-each select="troop">
            <h3>Troop#: <xsl:value-of select="@unitnumber"/>
              <br/>
              Troop Name: <xsl:value-of select="@unitname"/>
            </h3>
            <table border="1" style="text-align:center">
              <tr bgcolor="grey">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Rank</th>
                <th>Merit Badges</th>
              </tr>
              <xsl:for-each select="scout">
                <tr>
                  <td><xsl:value-of select="firstname"/></td>            
                  <td><xsl:value-of select="lastname"/></td>
                  <td><xsl:value-of select="phone"/></td>
                  <xsl:for-each select="address">
                    <td><xsl:value-of select="street"/></td>
                    <td><xsl:value-of select="city"/></td>
                    <td><xsl:value-of select="state"/></td>
                  </xsl:for-each>
                  <td><xsl:value-of select="rank"/></td>
                  <td>
                    <div style="text-align:right">
                      <xsl:for-each select="meritbadge">
                        <xsl:value-of select="."/>
                        earned on:<xsl:value-of select="@dateearned"/>
                        <br/>
                      </xsl:for-each>
                    </div>
                  </td>
                </tr>
              </xsl:for-each>
            </table>
          </xsl:for-each>
        </xsl:for-each>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
  

<!--
mysql실행법 cd /usr/local/mysql/bin 으로 들어가서
./mysql -uroot -p
그러고 나면..
패스워드 묻는데 아래꺼 입력

Password: dbsgur123 -->
<!DOCTYPE html>
<style>
        @import url('http://fonts.googleapis.com/css?family=Amarante');
      html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
        outline: none;
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      html { overflow-y: scroll; }
      body {
        background: #eee url('http://i.imgur.com/eeQeRmk.png'); /* http://subtlepatterns.com/weave/ */
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 62.5%;
        line-height: 1;
        color: #585858;
        padding: 22px 10px;
        padding-bottom: 55px;
      }

      ::selection { background: #5f74a0; color: #fff; }
      ::-moz-selection { background: #5f74a0; color: #fff; }
      ::-webkit-selection { background: #5f74a0; color: #fff; }

      br { display: block; line-height: 1.6em; }

      article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
      ol, ul { list-style: none; }

      input, textarea {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        outline: none;
      }

      blockquote, q { quotes: none; }
      blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
      strong, b { font-weight: bold; }

      table { border-collapse: collapse; border-spacing: 0; }
      img { border: 0; max-width: 100%; }

      h1 {
        font-family: 'Amarante', Tahoma, sans-serif;
        font-weight: bold;
        font-size: 3.6em;
        line-height: 1.7em;
        margin-bottom: 10px;
        text-align: center;
      }


      /** page structure **/
      #wrapper {
        display: block;
        width: 850px;
        background: #fff;
        margin: 0 auto;
        padding: 10px 17px;
        -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
      }

      #keywords {
        margin: 0 auto;
        font-size: 1.2em;
        margin-bottom: 15px;
      }


      #keywords thead {
        cursor: pointer;
        background: #c9dff0;
      }
      #keywords thead tr th {
        font-weight: bold;
        padding: 12px 30px;
        padding-left: 42px;
      }
      #keywords thead tr th span {
        padding-right: 20px;
        background-repeat: no-repeat;
        background-position: 100% 100%;
      }

      #keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
        background: #acc8dd;
      }

      #keywords thead tr th.headerSortUp span {
        background-image: url('http://i.imgur.com/SP99ZPJ.png');
      }
      #keywords thead tr th.headerSortDown span {
        background-image: url('http://i.imgur.com/RkA9MBo.png');
      }


      #keywords tbody tr {
        color: #555;
      }
      #keywords tbody tr td {
        text-align: center;
        padding: 15px 10px;
      }
      #keywords tbody tr td.lalign {
        text-align: left;
      }
      .myButton {
    	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
    	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
    	box-shadow:inset 0px 1px 0px 0px #ffffff;
    	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9));
    	background:-moz-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
    	background:-webkit-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
    	background:-o-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
    	background:-ms-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
    	background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
    	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9',GradientType=0);
    	background-color:#f9f9f9;
    	-moz-border-radius:6px;
    	-webkit-border-radius:6px;
    	border-radius:6px;
    	border:1px solid #ffffff;
    	display:inline-block;
    	cursor:pointer;
    	color:#666666;
    	font-family:Arial;
    	font-size:15px;
    	font-weight:bold;
    	padding:6px 24px;
    	text-decoration:none;
    	text-shadow:0px 1px 0px #ffffff;
      }
    .myButton:hover {
    	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9));
    	background:-moz-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
    	background:-webkit-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
    	background:-o-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
    	background:-ms-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
    	background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
    	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9',GradientType=0);
    	background-color:#e9e9e9;
    }
    .myButton:active {
    	position:relative;
    	top:1px;
    }
</style>
<html>
  <body>
<!-- Dashboard Table -->
 <div id="wrapper">
  <h1>Dashboard</h1>
  <!-- <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Original File</span></th>
        <th><span>Rows Uploaded</span></th>
        <th><span>Rows in Use</span></th>
        <th><span>Upload Time</span></th>
        <th><span>User</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="lalign">Excel File1</td>
        <td>6,000</td>
        <td>110</td>
        <td>4-21-2016</td>
        <td>22.2</td>
      </tr>
      <tr>
        <td class="lalign">Excel File2</td>
        <td>2,200</td>
        <td>500</td>
        <td>01-21-2017</td>
        <td>EPIDEMIA</td>
      </tr>
      <tr>
        <td class="lalign">Excel File3</td>
        <td>13,500</td>
        <td>900</td>
        <td>01-21-2011</td>
        <td>EPIDEMIA</td>
      </tr>
      <tr>
        <td class="lalign">Excel File4</td>
        <td>8,700</td>
        <td>350</td>
        <td>01-21-2016</td>
        <td>EPIDEMIA</td>
      </tr>
      <tr>
        <td class="lalign">Excel File5</td>
        <td>9,900</td>
        <td>460</td>
        <td>01-21-2017</td>
        <td>EPIDEMIA</td>
      </tr>
      <tr>
        <td class="lalign">Excel File6</td>
        <td>10,500</td>
        <td>748</td>
        <td>01-22-2017</td>
        <td>EPIDEMIA</td>
      </tr>
    </tbody>
  </table> -->
 </div>

<!-- File Upload  -->
  <form enctype="multipart/form-data" action="action.php" method="post" role="form" name="import">
          <li><label for="exampleInputFile">File Upload</label></li>
          <input type="file" class="myButton" name="file" id="file">
          <p>Only Excel</p>
          <!-- <a href="#" class="myButton">light grey</a> -->
      <input type="submit" class="myButton" name="submit" value="submit"/>
  </form>

<!-- Import File to Mysql -->

</body>
</html>
<!--MySQL안에다가 엑셀파일 넣는것이 되지 않음. 그거 해결 하기!  -->

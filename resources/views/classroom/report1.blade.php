<!DOCTYPE html>
<html>
  
<body bgcolor="lightblue">
    <center>
    <table border="1" cellspacing="5" bgcolor="white">
        <caption><b>Input Marks</b></caption>
        <tr>
            <th rowspan="2">Name</th>
            <th colspan="4">Score</th>
  
        </tr>
        <tr>
            <th>Hindi</th>
            <th>English</th>
            <th>Math</th>
            <th>C Programming</th>
        </tr>
        <tr>
            <td><input type="text" id="aname"></td>
            <td><input type="text" id="am"></td>
            <td><input type="text" id="aj"></td>
            <td><input type="text" id="ad"></td>
            <td><input type="text" id="an"></td>
        </tr>
        <tr>
            <th colspan="5" height="30">
            <input type="submit" value="Add To Table" onclick="Sub()"></th>
        </tr>    
    </table>
    <br>
    <table border="1" cellspacing="5" bgcolor="white" 
           height="100" width="500" cellpadding="5" id="TableScore">
        <caption><b>Student Data</b></caption>
        <tr>
            <th width="180">Name</th>
            <th>Total</th>
            <th>Average</th>
            <th>Pass Or Fail</th>
        </tr>
          
    </table>
    </center>
    <script type="text/javascript">
        function Sub(){
            var n, k, r, e, v, sum, avg;
            n=(document.getElementById('aname').value);
            k=parseFloat(document.getElementById('am').value);
            r=parseFloat(document.getElementById('aj').value);
            e=parseFloat(document.getElementById('ad').value);
            v=parseFloat(document.getElementById('an').value);
            // Calculating Total
            sum=k+r+e+v;
            avg=sum/4;
            // Display on Student Data
            var newTable = document.getElementById('TableScore');
            var row = newTable.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(0);
            var cell3 = row.insertCell(0);
            var cell4 = row.insertCell(0);
  
            cell4.innerHTML= n;
            cell3.innerHTML=sum;
            cell2.innerHTML = avg;
  
            if(avg>=70){
                cell1.innerHTML="<font color=green>Pass</font>";
            }else{
                cell1.innerHTML="<font color=red>Fail</font>";
            }
        }
    </script>
</body>
</html>
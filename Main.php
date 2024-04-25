<?php
include "database.php";



?>
<!DOCTYPE html>
<html lang="uk-UA">
<head>
  <title>Lab_</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Лабораторна робота №1  курсу 'Internet-технології' поток КІУКІз-21">
  <link href="css//styly1.css" type="text/css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="img//12345.png">
</head>
<body>
  <div class="header">
      <h1 >...</h1>
  </div>
  <div class="navbar">
    <a href="Main.php">Головна</a>
    <a href="result.php">Результат</a>
  </div>
  <div class="row">
    <div class="side">
      <p class="task"> БД для зберігання інформації про товари в інтернет-магазині. <br>Забезпечити виведення таких даних: <br>товари обраного виробника;<br>товари в обраної категорії;<br>товари в обраному ціновому діапазоні.</p>
    </div>
    <div class="main">
      <p class="task"> Товари в інтернет-магазині: </p>
      <form action="result.php" method="GET">
        <div class="search">
          <p > Категорія: </p>
          <select name="category" >
            <option value="Videocard">Videocard</option>
            <option value="CPU">CPU</option>
            <option value="Display">Display</option>
            <option value="Memory">Memory</option>
          </select>
        </div>
        <div class="search">
          <p > Виробник: </p>
          <select name="vendors" >
            <option value="LG">LG</option>
            <option value="ASUS">ASUS</option>
            <option value="Samsung">Samsung</option>
            <option value="Intel">Intel</option>
            <option value="AMD">AMD</option>
          </select>
        </div>
        <div class="search">
          <p > Ціна: </p>
          <p class="price"> Від: </p>
          <input type="text" name="price_min" value="0">
          <p class="price"> До: </p>
          <input type="text" name="price_max" value="3000">
        </div>

          <div class="search">
          <input type="submit" name="search" value="Пошук1" onclick="return sendRequest1()">
          <script>
              function sendRequest1() {
                var category = 'category'; 
                var vendors = 'vendors'; 
                var price_min = 'price_min';
                var price_max = 'price_max';  
                var search = 'search'; 

                var url1 = 'result.php?category=' + category + '&vendors=' + vendors + '&price_min=' + price_min + '&price_max=' + price_max + '&search=' + search;
                //console.log('Sending request to URL:', url1);
                var ajax = new XMLHttpRequest();
                ajax.open('GET', url1, true);
                ajax.onreadystatechange = function() {
                    if (ajax.readyState === 4){
                      if(ajax.status === 200) {
                        //console.log('Response from server:', ajax.responseText);
                        alert(ajax.responseText);  
                           
                    }  }
   
                };
                ajax.send(null);      
              }
              
          </script>
        </div>

        <div class="search">
          <input type="submit" name="search" value="Пошук2" onclick="return sendRequest2()">

                  <script>
                    function sendRequest2() 
                    {
                      var category = 'category'; 
                        var vendors = 'vendors'; 
                        var price_min = 'price_min';
                        var price_max = 'price_max';  
                        var search = 'search'; 

                        var url2 = 'result.php?category=' + category + '&vendors=' + vendors + '&price_min=' + price_min + '&price_max=' + price_max + '&search=' + search;
                        //console.log('Sending request to URL:', url2);
                        var ajax = new XMLHttpRequest();
                        ajax.open('GET', url2, true);
                        ajax.onreadystatechange = function() {
                            if (ajax.readyState === 4 && ajax.status === 200) 
                            {
                             // console.log('Response from server:', ajax.responseXML);
                              var responseXml = ajax.responseXML;  
                            }
                        };
                        ajax.send();      
                    }
                  </script>
         </div>   

        <div class="search">
          <input type="submit" name="search" value="Пошук3" onclick="return sendRequest3()">
         <script>
           function sendRequest3() 
          {
              var category = 'category'; 
              var vendors = 'vendors'; 
              var price_min = 'price_min';
              var price_max = 'price_max';  
              var search = 'search'; 

              var url3 = 'joson.php?category=' + category + '&vendors=' + vendors + '&price_min=' + price_min + '&price_max=' + price_max + '&search=' + search;
                        
                var ajax = new XMLHttpRequest();
                ajax.open("GET", url3, true);
                ajax.onload = function() {
                if(ajax.status===200) {
                //console.dir(ajax.response);
                let res = JSON.parse(ajax.response);
                document.getElementById('result-json').innerHTML = res;
                }
                }
                ajax.send();
            }

         </script>
      


        </div> 
      </form>

    </div>
  </div>
</div>
  <div class="footer">
    <h2>Лабораторна робота №2 </h2>
    <p> Варіант №5</p> 
  </div>
</body>
</html>
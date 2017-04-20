<?php
/*
Plugin Name: ParCons
Plugin URI: serfsave.wordpress.com
Description: Plugin per la gestione dei pareri in consiglio municipale/comunale
Version: 1.1.5
Author: Francesco saverio Ricci
Author URI: https://serfsave.wordpress.com
License: GPLv3
*/


//Security
//if (!defined('ABSPATH')) {die();}
//if (!defined('WP_INSTALLING') && WP_INSTALLING) {return;}
 
require_once( ABSPATH . "wp-includes/pluggable.php" );

if(isset($_POST['new_post']) == '1') {
  $post_title = $_POST['post_title'];
    $post_category = $_POST['cat'];
    $post_content = $_POST['post_content'];

    $new_post = array(
          'ID' => '',
          'post_type' => 'post',
          'post_author' => $user->ID, 
          'post_category' => array($post_category),
          'post_content' => $post_content, 
          'post_title' => $post_title,
          'post_status' => 'publish'
        );

    $post_id = wp_insert_post($new_post);

    // This will redirect you to the newly created post
    $post = get_post($post_id);
    wp_redirect($post->guid);
}      



 function parcons_filter_title_test($title)
{
    return 'Titolo: ' .$title;
}

function parcons_update_options_form()
{
    ?>

   
   <!DOCTYPE html>
<html lang="it">

<head>
    <script>
        function newRowtable(){
                
                var t = document.getElementById("tabellaodg");
                var num_odg = document.getElementById("num_odg").value ;
                var des_odg = document.getElementById("des_odg").value;
                var x = document.getElementById("mySelect").selectedIndex;
                var y = document.getElementById("mySelect").options;
                var parere_odg = y[x].text;
                
                ++document.getElementById("num_odg").value;
                document.getElementById("des_odg").value = '';
           
                var tr = document.createElement('tr');
                var td1 = document.createElement('td');
	            var tx1 = document.createTextNode(num_odg);
            
                var td2 = document.createElement('td');
                var tx2 = document.createTextNode(des_odg);
                var td3 = document.createElement('td');
                var tx3 = document.createTextNode(parere_odg);
                
               td1.appendChild(tx1);
               td2.appendChild(tx2);
               td3.appendChild(tx3);
               
               var att = document.createAttribute('class');        // Create a "href" attribute
               
               switch (parere_odg) {
                   case 'Favorevole':
                        att.value = 'td_favorevole';            // Set the value of the href attribute
                        break;
                   case 'Contrario':
                        att.value = 'td_contrario';            // Set the value of the href attribute
                        break;
                   case 'Astenuto':
                        att.value = 'td_astenuto';            // Set the value of the href attribute
                        break;
                   case 'Assente':
                        att.value = 'td_assente';            // Set the value of the href attribute
                        break;
                   default:
                        att.value = 'NOT VALID';            // Set the value of the href attribute
               } 
               
            
               td3.setAttributeNode(att);  // Add the href attribute to <a>
               tr.appendChild(td1);
               tr.appendChild(td2);
               tr.appendChild(td3);
	           t.appendChild(tr);  
            
            
            
        }  
    </script>
   
    <style>
    
        body {
            background-color: beige;
            margin-top: 20px;
            padding: 0;
            
        }
        
        h2 {
             width: 100%;
            text-align: center;
            margin: 0;
        }
        
        div#cm {
            width: 80%;
            padding-top: 20px;
            text-align: center;
            margin: 0 auto;
            
        }
        
        div#cp {
            width: 80%;
            padding-top: 20px;
            text-align: right;
            margin: 0 auto;
            
        }
            
        div#agg-odg {
            width: 80%;
            padding-top: 20px;
            text-align: right;
            margin: 0 auto;
            
        }
        
        div#ins-odg {
            width: 80%;
            padding-top: 20px;
            text-align: left;
            margin: 0 auto;
            
        }
        
        #data-consiglio{
            margin-left: 10px;
        }
        
        table, td, th {    
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            
        }

        th {
        padding: 15px;
        }
        
        td {
        padding: 15px;
        padding-top: 5px;
        padding-bottom: 5px;
        }
        
        #colonna1{
            width: 5%;
        }
        
        #colonna2{
            width: 65%;
        }
        
        #colonna3{
            width: 30%;
        }
        
        #num_odg{
            width: 5%;
        }
        
        #des_odg{
            width: 65%;
        }
        
        #parere_odg{
            width: 25%;
        }
        
        td.td_favorevole{
        color: green;
        }
         td.td_contrario{
        color: red;
        }
         td.td_astenuto{
        color: blue;
        }
         td.td_assente{
        color: magenta;
        }
        
        
        
            
    </style>
    
</head>

<body>
        
 <form>
    <div id="data-consiglio" class="fallbackDatePicker" align="center">
      <label for="bday">Consiglio municipale del: </label>
       <span>
        <select id="day" name="day">
        <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
          <option>31</option>
        </select>
      </span>
      <span>
        <select id="month" name="month">
          <option selected>Gennaio</option>
          <option>Febbraio</option>
          <option>Marzo</option>
          <option>Aprile</option>
          <option>Maggio</option>
          <option>Giugno</option>
          <option>Luglio</option>
          <option>Agosto</option>
          <option>Settembre</option>
          <option>Ottobre</option>
          <option>Novembre</option>
          <option>Dicembre</option>
        </select>
      </span>
      <span>
        <select id="year" name="year">
        <option>2014</option>
        <option>2015</option>
        <option>2016</option>
        <option>2017</option>
        <option>2018</option>
        <option>2019</option>
        </select>
      </span>
      <span class="validity"></span>
    </div>
 </form>
        
<table align="center">
  <tr>
    <th id="colonna1">O.D.G
        <br/><input id="num_odg" type="text" value="1" style="width: 95%;"></th>
    <th id="colonna2">Descrizione o.d.g.
        <br/><input id="des_odg" type="text" placeholder="Inserisci qui il punto all'o.d.g!" style="width: 95%;"></th>
    <th id="colonna3">Parere
        <br/><select id="mySelect" style="width: 60%;">
            <option>Favorevole</option>
            <option>Contrario</option>
            <option>Astenuto</option>
            <option>Assente</option>
            </select>
            <input type="button" value="+ Odg" onclick="newRowtable()" style="width: 35%;">
    </th>
  </tr>
  <tbody id ="tabellaodg">
    
  </tbody>
</table>

<div id="cp">  

   <form method="post" action=""> 
    <input type="text" name="post_title" size="45" id="input-title"/>
    <?php wp_dropdown_categories('orderby=name&hide_empty=0&exclude=1&hierarchical=1'); ?>
    <textarea rows="5" name="post_content" cols="66" id="text-desc"></textarea> 
    <input type="hidden" name="new_post" value="1"/> 
    <input class="subput round" type="submit" name="submit" value="Post"/>
</form>
   
    </div>
   
</body>
    
</html>  
   
   
   
   
   
   
   
   
   
   
   
   
  
   
    <?php
}

function parcons_add_option_page()
{
    add_options_page('Crea pagina pareri', 'Impostazioni PC', 'administrator', 'parcons-options-page', 'parcons_update_options_form');
}



add_action('admin_menu', 'parcons_add_option_page');
add_filter('the_title', 'parcons_filter_title_test');





  
    



?>
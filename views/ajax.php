<script type="text/javascript">
var XMLHttpRequestObject=false; //creer var
if(window.XMLHttpRequest){
  XMLHttpRequestObject=new XMLHttpRequest();
}else if(window.ActiveXObject){
  XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
}

                //the functionS to add to the cart
                function addtocart(){
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","../class/shop_cartController.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){

                    
                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var datar=XMLHttpRequestObject.responseText;
                      var divsee=document.getElementById("displayCart");/// la ou ca va afficher 
                      divsee.innerHTML=datar;
                    }
                }
                    //les variables a etre envoyer et utiliser
                    var client=document.getElementById("clientID").value;
                    var prod=document.getElementById("productID").value;
                    var prod_table=document.getElementById("product_table").value;
                    var subcat=document.getElementById("subCategoryID").value;
                    var cat=document.getElementById("categoryID").value;
                    var quantity=document.getElementById("quantity").value;
                    var price=document.getElementById("price").value;
                    
                    var data=client+'|'+prod+'|'+prod_table+'|'+subcat+'|'+cat+'|'+quantity+'|'+price+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("addtocart=" + data); // Send variables
                  }
                  return false;
                }

                //the functionS to delete to the cart
                function deltocart(){
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","../class/shop_cartController.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){

                    
                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var datar=XMLHttpRequestObject.responseText;
                      var divsee=document.getElementById("displayCart");/// la ou ca va afficher 
                      divsee.innerHTML=datar;
                    }
                }
                    //les variables a etre envoyer et utiliser
                    var client=document.getElementById("clientID").value;
                    var prod=document.getElementById("productID").value;
                    var prod_table=document.getElementById("product_table").value;
                    var subcat=document.getElementById("subCategoryID").value;
                    var cat=document.getElementById("categoryID").value;
                    var quantity=document.getElementById("quantity").value;
                    var price=document.getElementById("price").value;
                    
                    var data=client+'|'+prod+'|'+prod_table+'|'+subcat+'|'+cat+'|'+quantity+'|'+price+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("deltocart=" + data); // Send variables
                  }
                  return false;
                }

                //the functionS to delete to the cart
                function deltocartOne(){
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","../class/shop_cartController.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){

                    
                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var datar=XMLHttpRequestObject.responseText;
                      var divsee=document.getElementById("displayCart");/// la ou ca va afficher 
                      divsee.innerHTML=datar;
                    }
                }
                    //les variables a etre envoyer et utiliser
                    var client=document.getElementById("clientID").value;
                    var prod=document.getElementById("productID").value;
                    
                    var data=client+'|'+prod+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("deltocartOne=" + data); // Send variables
                  }
                  return false;
                }

                 //the functionS to add to the wishlist
                function addLike(){
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","../class/shop_wishingController.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){

                    
                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var datar=XMLHttpRequestObject.responseText;
                      var divsee=document.getElementById("displayWish");/// la ou ca va afficher 
                      divsee.innerHTML=datar;
                    }
                }
                    //les variables a etre envoyer et utiliser
                    var client=document.getElementById("clientID").value;
                    var prod=document.getElementById("productID").value;
                    var prod_table=document.getElementById("product_table").value;
                    var subcat=document.getElementById("subCategoryID").value;
                    var cat=document.getElementById("categoryID").value;
                    var quantity=document.getElementById("quantity").value;
                    var price=document.getElementById("price").value;
                    
                    var data=client+'|'+prod+'|'+prod_table+'|'+subcat+'|'+cat+'|'+quantity+'|'+price+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("addLike=" + data); // Send variables
                  }
                  return false;
                }

                //the functionS to delete to the wishlist
                function delLike(){
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","../class/shop_wishingController.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){

                    
                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var datar=XMLHttpRequestObject.responseText;
                      var divsee=document.getElementById("displayWish");/// la ou ca va afficher 
                      divsee.innerHTML=datar;
                    }
                }
                    //les variables a etre envoyer et utiliser
                    var client=document.getElementById("clientID").value;
                    var prod=document.getElementById("productID").value;
                    var prod_table=document.getElementById("product_table").value;
                    var subcat=document.getElementById("subCategoryID").value;
                    var cat=document.getElementById("categoryID").value;
                    var quantity=document.getElementById("quantity").value;
                    var price=document.getElementById("price").value;
                    
                    var data=client+'|'+prod+'|'+prod_table+'|'+subcat+'|'+cat+'|'+quantity+'|'+price+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("delLike=" + data); // Send variables
                  }
                  return false;
                }
</script>
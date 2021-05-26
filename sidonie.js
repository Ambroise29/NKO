var table=document.getElementById('vvv'),somval=0;
for(i=1;i<table.rows.length;i++)
{
 somval=somval+parseInt(table.row[i].cells[4].innerHTML) ;  
}
console.log(somval);


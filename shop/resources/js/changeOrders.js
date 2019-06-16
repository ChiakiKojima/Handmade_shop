$(() => {
   
   let items = document.getElementsByName('items');
   let price = document.getElementsByName('price');
   let num = document.getElementsByName('num[]');
   let subtotal = document.getElementsByName('subtotal');
   //let totalPrice = 0;
   let sum = document.getElementById('sum');
   let hiddenSum = document.getElementById('hiddenSum');
   
   for (let i = 0; i < items.length; i++) {
      
      num[i].addEventListener('blur', function() {
         let changedNum = parseInt(num[i].value, 10);
         subtotal[i].innerHTML ='<td>' + parseInt(price[i].textContent,10) * changedNum + '円</td>';
         let changedSum = 0;
         for (let j = 0; j < items.length; j++) {
            changedSum += parseInt(subtotal[j].textContent, 10);
         
      }
      
      sum.innerHTML = '<h3>' + changedSum + '円</h3>';
      hiddenSum.value = changedSum;
      });
   }

});

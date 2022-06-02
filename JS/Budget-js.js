var balance = 0;

document.getElementById("Add_Income").addEventListener("click", Calc_Inc);
document.getElementById("Add_Expence").addEventListener("click", Calc_Exp);

var hist_Count= 0;

var total_Income = 0;
var total_Expence = 0;

function Check_valid_Inc(){
      var inc_mode = document.forms["income-form"]["Income-mode"].value;
      var inc_amt = document.forms["income-form"]["Income-amt"].value;

      inc_amt = inc_amt.toString();

      if(inc_amt === ""){
          missing_Entry();
          return false;
      }

      if(inc_mode===""){
          missing_Entry();
          return false;
      }

      if ((/\D/.test(inc_amt))){
          invalid_entry();
          return false;
      }



      return true;
}

function   Check_valid_Exp(){
      var exp_amt = document.forms["expence-form"]["Expence-amt"].value;
      var exp_mode = document.forms["expence-form"]["Expence-mode"].value;

      if(exp_amt === ""){
          missing_Entry();
          return false;
      }

      if(exp_mode===""){
        missing_Entry();
        return false;
      }

      if (/\D/.test(exp_amt)){
          invalid_entry();
          return false;
      }



      return true;
}

// error messages
function Balance_Err(){

    document.getElementById("Err_Msg").innerHTML="Balance Not Sufficient";
}

function missing_Entry(){

  document.getElementById("Err_Msg").innerHTML="Fill in All Entries.";
}

function invalid_entry(){

  document.getElementById("Err_Msg").innerHTML="Please Fill in Valid Enties.";
}




// calculating income and expense
function Calc_Inc(){
    if(Check_valid_Inc()){

          var inc_amt = document.forms["income-form"]["Income-amt"].value;

          inc_amt = parseInt(inc_amt);
          balance += inc_amt;

          total_Income += inc_amt;

          document.getElementById("Balance-Budget").innerHTML = balance + " ₹";
          var inc_mode = document.forms["income-form"]["Income-mode"].value;

          // getting time and date
          const d = new Date();
          var date = d.getDate()+"/"+d.getMonth()+"/"+(d.getYear()+1900);
          var time = d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();


          // update history
          hist_Count += 1;
          var table = document.getElementById("hist-table");
          var row = table.insertRow(hist_Count);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          var cell6 = row.insertCell(5);

          cell1.innerHTML = "Income";
          cell2.innerHTML = inc_mode;
          cell3.innerHTML = inc_amt+"₹ ";
          cell4.innerHTML = date;
          cell5.innerHTML = time;

          // resetting forms
          document.getElementById("income-form").reset();
          Change_progress_dist();

          document.getElementById("Err_Msg").innerHTML="";
  }
}

function Calc_Exp(){

    if(Check_valid_Exp()){

          var exp_amt = document.forms["expence-form"]["Expence-amt"].value;
          exp_amt = parseInt(exp_amt);

          if(parseInt(exp_amt)>balance){
              Balance_Err();
          }



          else{
              balance -= exp_amt;
              total_Expence += exp_amt;

              document.getElementById("Balance-Budget").innerHTML = balance + " ₹";
              var exp_mode = document.forms["expence-form"]["Expence-mode"].value;


              // getting time and date
              const d = new Date();
              var date = d.getDate()+"/"+d.getMonth()+"/"+(d.getYear()+1900);
              var time = d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();


              // update history
              hist_Count += 1;
              var table = document.getElementById("hist-table");
              var row = table.insertRow(hist_Count);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              var cell5 = row.insertCell(4);
              var cell6 = row.insertCell(5);

              cell1.innerHTML = "Expence";
              cell2.innerHTML = exp_mode;
              cell3.innerHTML = exp_amt+"₹ ";
              cell4.innerHTML = date;
              cell5.innerHTML = time;

              document.forms["expence-form"].reset();
              Change_progress_dist();
              document.getElementById("Err_Msg").innerHTML="";
            }
          }
}



//updating the income-expence ratio
function Change_progress_dist(){
    var inc_ratio = (total_Income/(total_Income+total_Expence)) * 100;
    var exp_ratio = (total_Expence/(total_Income+total_Expence)) * 100;

    document.getElementById("Income-bar").style.width =  inc_ratio + "%";
    document.getElementById("Expence-bar").style.width = exp_ratio + "%";

    document.getElementById("income_perc").innerHTML = Math.floor(inc_ratio) + "%";
    document.getElementById("expense_perc").innerHTML = Math.floor(exp_ratio) + "%";
}



//updating the income distribution Ratio
function Change_progress_dist(){
    var inc_ratio = (total_Income/(total_Income+total_Expence)) * 100;
    var exp_ratio = (total_Expence/(total_Income+total_Expence)) * 100;

    document.getElementById("Income-bar").style.width =  inc_ratio + "%";
    document.getElementById("Expence-bar").style.width = exp_ratio + "%";

    document.getElementById("income_perc").innerHTML = Math.floor(inc_ratio) + "%";
    document.getElementById("expense_perc").innerHTML = Math.floor(exp_ratio) + "%";
}

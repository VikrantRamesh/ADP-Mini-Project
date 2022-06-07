var balance = 0;

document.getElementById("Add_Income").addEventListener("click", Calc_Inc);
document.getElementById("Add_Expence").addEventListener("click", Calc_Exp);

var hist_Count= 0;

var total_Income = 0;
var total_Expence = 0;

// income variables
var salary = 0;
var bonus = 0;
var gift = 0;
var others = 0;


// expense variables
var food = 0;
var health = 0;
var transport = 0;
var clothes = 0;
var communications = 0;
var entertainment = 0;
var sports = 0;
var eating = 0;
var toiletry = 0;

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
          var inc_mode = document.forms["income-form"]["Income-mode"].value;

          inc_amt = parseInt(inc_amt);
          balance += inc_amt;

          total_Income += inc_amt;

          document.getElementById("Balance-Budget").innerHTML = balance + " ₹";

          // getting time and date
          const d = new Date();
          var date = d.getDate()+"/"+d.getMonth()+"/"+(d.getYear()-100);
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
          Change_inc_progress_dist(inc_amt,inc_mode);

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
              var date = d.getDate()+"/"+d.getMonth()+"/"+(d.getYear()-100                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           );
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
              Change_inc_progress_dist();
              Change_exp_progress_dist(exp_amt,exp_mode);
              change_Today_Balance_amt();

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


//updating the income distribution
function Change_inc_progress_dist(inc_amt, inc_mode){

    if (inc_mode == "Salary"){
        salary += inc_amt;
    }
    else if (inc_mode == "Bonus"){
        bonus += inc_amt;
    }
    else if (inc_mode == "Gift"){
        gift += inc_amt;
    }
    else if (inc_mode == "Others"){
        others += inc_amt;
    }

    var salary_ratio = (salary/(total_Income)) * 100;
    var bonus_ratio = (bonus/(total_Income)) * 100;
    var gift_ratio = (gift/(total_Income)) * 100;
    var others_ratio = (others/(total_Income)) * 100;

    document.getElementById("Salary-bar").style.width =  salary_ratio + "%";
    document.getElementById("Bonus-bar").style.width = bonus_ratio + "%";
    document.getElementById("Gift-bar").style.width = gift_ratio + "%";
    document.getElementById("Others-bar").style.width = others_ratio + "%";

    document.getElementById("salary_perc").innerHTML = Math.floor(salary_ratio) + "%";
    document.getElementById("bonus_perc").innerHTML = Math.floor(bonus_ratio) + "%";
    document.getElementById("gift_perc").innerHTML = Math.floor(gift_ratio) + "%";
    document.getElementById("others_perc").innerHTML = Math.floor(others_ratio) + "%";
}

//updating the expense distribution
function Change_exp_progress_dist(inc_amt, inc_mode){

    if (inc_mode == "Food"){
        food += inc_amt;
    }
    else if (inc_mode == "Health"){
        health += inc_amt;
    }
    else if (inc_mode == "Transport"){
        transport += inc_amt;
    }
    else if (inc_mode == "Clothes"){
        clothes += inc_amt;
    }
    else if (inc_mode == "Communications"){
        communications += inc_amt;
    }
    else if (inc_mode == "Entertainment"){
        entertainment += inc_amt;
    }
    else if (inc_mode == "Sports"){
        sports += inc_amt;
    }
    else if (inc_mode == "Eating"){
        eating += inc_amt;
    }
    else if (inc_mode == "Toiletry"){
        toiletry += inc_amt;
    }

    var food_ratio = (food/(total_Expence)) * 100;
    var health_ratio = (health/(total_Expence)) * 100;
    var transport_ratio = (transport/(total_Expence)) * 100;
    var clothes_ratio = (clothes/(total_Expence)) * 100;
    var communications_ratio = (communications/(total_Expence)) * 100;
    var entertainment_ratio = (entertainment/(total_Expence)) * 100;
    var sports_ratio = (sports/(total_Expence)) * 100;
    var eating_ratio = (eating/(total_Expence)) * 100;
    var toiletry_ratio = (toiletry/(total_Expence)) * 100;


    var max = Math.max(food_ratio,health_ratio,transport_ratio,clothes_ratio,communications_ratio,entertainment_ratio,sports_ratio,eating_ratio,toiletry_ratio);

    var percentile_food = (food_ratio/max)*100;
    var percentile_health = (health_ratio/max)*100;
    var percentile_transport = (transport_ratio/max)*100;
    var percentile_clothes = (clothes_ratio/max)*100;
    var percentile_communications = (communications_ratio/max)*100;
    var percentile_entertainment = (entertainment_ratio/max)*100;
    var percentile_sports = (sports_ratio/max)*100;
    var percentile_eating = (eating_ratio/max)*100;
    var percentile_toiletry = (toiletry_ratio/max)*100;

    document.getElementById("food-bar").style.width =  percentile_food + "%";
    document.getElementById("health-bar").style.width = percentile_health + "%";
    document.getElementById("transport-bar").style.width = percentile_transport + "%";
    document.getElementById("clothes-bar").style.width = percentile_clothes + "%";
    document.getElementById("communications-bar").style.width =  percentile_communications + "%";
    document.getElementById("entertainment-bar").style.width = percentile_entertainment + "%";
    document.getElementById("sports-bar").style.width = percentile_sports + "%";
    document.getElementById("eating-bar").style.width = percentile_eating + "%";
    document.getElementById("toiletry-bar").style.width = percentile_toiletry + "%";

    document.getElementById("food_perc").innerHTML = Math.floor(food_ratio) + "%";
    document.getElementById("health_perc").innerHTML = Math.floor(health_ratio) + "%";
    document.getElementById("transport_perc").innerHTML = Math.floor(transport_ratio) + "%";
    document.getElementById("clothes_perc").innerHTML = Math.floor(clothes_ratio) + "%";
    document.getElementById("communications_perc").innerHTML = Math.floor(communications_ratio) + "%";
    document.getElementById("entertainment_perc").innerHTML = Math.floor(entertainment_ratio) + "%";
    document.getElementById("sports_perc").innerHTML = Math.floor(sports_ratio) + "%";
    document.getElementById("eating_perc").innerHTML = Math.floor(eating_ratio) + "%";
    document.getElementById("toiletry_perc").innerHTML = Math.floor(toiletry_ratio) + "%";
}



var today_Limit = 2000;

// functions of the second fluid-container


function exp_limit_select(){
    today_Limit = document.getElementById("select_limit").value;
    today_Limit = parseInt(today_Limit);

    change_Today_Balance_amt();
}

function exp_limit_text(){
  today_Limit = document.getElementById("custom_limit").value;
  today_Limit = parseInt(today_Limit);

  change_Today_Balance_amt();
}

function change_Today_Balance_amt(){
    var balance = today_Limit - total_Expence ;
    document.getElementById("rem-balance-amt").innerHTML = "₹"+balance;

    if (balance <= 0){
        document.getElementById("rem-balance-amt").style.color = "#D21F3C";
    }
    else{
      document.getElementById("rem-balance-amt").style.color = "white";
    }

    var max = Math.max(food,health,transport,clothes,communications,entertainment,sports,eating,toiletry);

    if (max !=0){
        var max_exp_text = ""

        if (max == food){
            max_exp_text += "<br>Food: " + max +"₹";
        }
        if (max == health){
            max_exp_text += "<br>Health: "+ max+"₹";
        }
        if (max == transport){
            max_exp_text += "<br>Transport: "+ max+"₹";
        }
        if (max == clothes){
            max_exp_text += "<br>Clothes: "+ max+"₹";
        }
        if (max == communications){
            max_exp_text += "<br>Communications: "+ max+"₹";
        }
        if (max == entertainment){
            max_exp_text += "<br>Entertainment: "+ max+"₹";
        }
        if (max == sports){
            max_exp_text += "<br>Sports: "+ max+"₹";
        }
        if (max == eating){
            max_exp_text += "<br>Eating: "+ max+"₹";
        }
        if (max == toiletry){
            max_exp_text += "<br>Toiletry: "+ max+"₹";
        }

        document.getElementById("max_exp_text").innerHTML = max_exp_text;
  }

    // changing progress bar
    document.getElementById("Daily-exp-bar-rem").style.width = (today_Limit/(total_Expence+today_Limit)) *100 + "%";
    document.getElementById("Daily-exp-bar-spent").style.width = (total_Expence/(total_Expence+today_Limit)) *100+ "%";

}

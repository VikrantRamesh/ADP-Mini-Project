
document.getElementById("Add_Income").addEventListener("click", Calc_Inc);
document.getElementById("Add_Expence").addEventListener("click", Calc_Exp);



//class for balances
class user_balances{
	 constructor(){
		 this.balance = 0;
		 this.total_Income = 0;
		 this.total_Expence = 0;

		 //fetch value from server after integration of backend
	 }
}

//creating a balance object
var bal = new user_balances;




//class for income
class income_class{
		constructor(class_title = none)
		{
			this.title = class_title;
			this.amt = 0;
		}

		add_amt(amount){
			this.amt += amount;
			bal.balance += amount;
			bal.total_Income += amount;
			document.getElementById("Balance-Budget").innerHTML = "₹ "+ bal.balance ;
		}

		reset_forms(){
			// resetting forms
			document.getElementById("income-form").reset();
		}

		change_dist(inc_amt,inc_mode){
			change_dist.Change_progress_dist();
			change_dist.Change_inc_progress_dist(inc_amt,inc_mode);
		}
}

//OBJECTS for income class
var salary = new income_class("Salary");
var bonus =  new income_class("Bonus");
var gift =  new income_class("Gift");
var others =  new income_class("Others");

const inc_arr = [salary,bonus,gift,others];



//class for expense
class expense_class{

		constructor(class_title = none)
		{
			this.title = class_title;
			this.amt = 0;
		}

		add_amt(amount){
			this.amt += amount;
			bal.balance -= amount;
			bal.total_Expence += amount;
			document.getElementById("Balance-Budget").innerHTML = bal.balance + " ₹";
		}

		reset_forms(){
			// resetting forms
      document.forms["expence-form"].reset();
		}

		change_dist(exp_amt,exp_mode){
			change_dist.Change_progress_dist();
			change_dist.Change_exp_progress_dist(exp_amt,exp_mode);
			daily_lim.change_Today_Balance_amt();
		}


}

//OBJECTS for expense class
var food = new expense_class("Food");
var health = new expense_class("Health");
var transport = new expense_class("Transport");
var clothes = new expense_class("Clothes");
var taxes = new expense_class("taxes");
var entertainment = new expense_class("Entertainment");
var sports = new expense_class("Sports");
var eating = new expense_class("Eating Out");
var toiletry = new expense_class("Toiletry");

const exp_arr = [food,health,transport,clothes,taxes,entertainment,sports,eating,toiletry];




//class for managing all kinds of distributions charts
class change_distribution{

	//updating the income-expence ratio
			Change_progress_dist(){
			    var inc_ratio = (bal.balance/(bal.total_Income)) * 100;
			    var exp_ratio = (bal.total_Expence/(bal.total_Income)) * 100;

			    document.getElementById("Income-bar").style.width =  inc_ratio + "%";
			    document.getElementById("Expence-bar").style.width = exp_ratio + "%";

			    document.getElementById("income_perc").innerHTML = inc_ratio.toFixed(1) + "%";
			    document.getElementById("expense_perc").innerHTML = exp_ratio.toFixed(1) + "%";
			}

			//****CHANGE HARDCODED VALUES****//

			//updating the income distribution
			Change_inc_progress_dist(inc_amt, inc_mode){

			    var salary_ratio = (salary.amt/(bal.total_Income)) * 100;
			    var bonus_ratio = (bonus.amt/(bal.total_Income)) * 100;
			    var gift_ratio = (gift.amt/(bal.total_Income)) * 100;
			    var others_ratio = (others.amt/(bal.total_Income)) * 100;

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
			Change_exp_progress_dist(inc_amt, inc_mode){


			    var food_ratio = (food.amt/(bal.total_Expence)) * 100;
			    var health_ratio = (health.amt/(bal.total_Expence)) * 100;
			    var transport_ratio = (transport.amt/(bal.total_Expence)) * 100;
			    var clothes_ratio = (clothes.amt/(bal.total_Expence)) * 100;
			    var taxes_ratio = (taxes.amt/(bal.total_Expence)) * 100;
			    var entertainment_ratio = (entertainment.amt/(bal.total_Expence)) * 100;
			    var sports_ratio = (sports.amt/(bal.total_Expence)) * 100;
			    var eating_ratio = (eating.amt/(bal.total_Expence)) * 100;
			    var toiletry_ratio = (toiletry.amt/(bal.total_Expence)) * 100;


			    var max = Math.max(food_ratio,health_ratio,transport_ratio,clothes_ratio,taxes_ratio,entertainment_ratio,sports_ratio,eating_ratio,toiletry_ratio);

			    var percentile_food = (food_ratio/max)*100;
			    var percentile_health = (health_ratio/max)*100;
			    var percentile_transport = (transport_ratio/max)*100;
			    var percentile_clothes = (clothes_ratio/max)*100;
			    var percentile_taxes = (taxes_ratio/max)*100;
			    var percentile_entertainment = (entertainment_ratio/max)*100;
			    var percentile_sports = (sports_ratio/max)*100;
			    var percentile_eating = (eating_ratio/max)*100;
			    var percentile_toiletry = (toiletry_ratio/max)*100;

			    document.getElementById("food-bar").style.width =  percentile_food + "%";
			    document.getElementById("health-bar").style.width = percentile_health + "%";
			    document.getElementById("transport-bar").style.width = percentile_transport + "%";
			    document.getElementById("clothes-bar").style.width = percentile_clothes + "%";
			    document.getElementById("taxes-bar").style.width =  percentile_taxes + "%";
			    document.getElementById("entertainment-bar").style.width = percentile_entertainment + "%";
			    document.getElementById("sports-bar").style.width = percentile_sports + "%";
			    document.getElementById("eating-bar").style.width = percentile_eating + "%";
			    document.getElementById("toiletry-bar").style.width = percentile_toiletry + "%";

			    document.getElementById("food_perc").innerHTML = Math.floor(food_ratio) + "%";
					if(food_ratio!=0){
							document.getElementById("food_perc").style.color = "white";
					}
			    document.getElementById("health_perc").innerHTML = Math.floor(health_ratio) + "%";

					if(health_ratio!=0){
												document.getElementById("health_perc").style.color = "white";
					}

			    document.getElementById("transport_perc").innerHTML = Math.floor(transport_ratio) + "%";
					if(transport_ratio!=0){
						document.getElementById("transport_perc").style.color = "white";
					}

			    document.getElementById("clothes_perc").innerHTML = Math.floor(clothes_ratio) + "%";
					if(clothes_ratio!=0){
						document.getElementById("clothes_perc").style.color = "white";
					}

			    document.getElementById("taxes_perc").innerHTML = Math.floor(taxes_ratio) + "%";
					if(taxes_ratio!=0){
						document.getElementById("taxes_perc").style.color = "white";
					}

			    document.getElementById("entertainment_perc").innerHTML = Math.floor(entertainment_ratio) + "%";
					if(entertainment_ratio!=0){
						document.getElementById("entertainment_perc").style.color = "white";
					}

			    document.getElementById("sports_perc").innerHTML = Math.floor(sports_ratio) + "%";
					if(sports_ratio!=0){
						document.getElementById("sports_perc").style.color = "white";
					}

			    document.getElementById("eating_perc").innerHTML = Math.floor(eating_ratio) + "%";
					if(eating_ratio!=0){
						document.getElementById("eating_perc").style.color = "white";
					}

			    document.getElementById("toiletry_perc").innerHTML = Math.floor(toiletry_ratio) + "%";
					if(toiletry_ratio!=0){
						document.getElementById("toiletry_perc").style.color = "white";
					}
			}

}

//OBJECT for change_distribution
var change_dist = new change_distribution;




//class for maintaining the history table
class history_table{

	constructor(){
		this.hist_Count =0;
	}
	update_history(mode,amt,trans_type){
          // update history
          this.hist_Count += 1;
          var table = document.getElementById("hist-table");
          var row = table.insertRow(this.hist_Count);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);

					// getting time and date
					var date = this.get_date();
					var time = 	this.get_time();

					cell1.innerHTML = trans_type;
					cell2.innerHTML = mode;
					cell3.innerHTML = amt+"₹ ";
					cell4.innerHTML = date;
					cell5.innerHTML = time;
	}


	get_date(){
		const d = new Date();
		var date = d.getDate()+"/"+d.getMonth()+"/"+(d.getYear()-100);
		return date;
	}

	get_time(){
		const d = new Date();
		var time = d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
		return time;
	}


}

//OBJECT for history table
var hist_table = new history_table;


//class for error messages
class err_msg{

		// error messages
		Balance_Err(){
    		document.getElementById("Err_Msg").innerHTML="Balance Not Sufficient";
		}

		missing_Entry(){
  			document.getElementById("Err_Msg").innerHTML="Fill in All Entries.";
		}

		invalid_entry(){
  			document.getElementById("Err_Msg").innerHTML="Please Fill in Valid Enties.";
		}

		No_err(){
						document.getElementById("Err_Msg").innerHTML="";
		}

}


//OBJECTS for errors
var inc_err = new err_msg();
var exp_err = new err_msg();








//class for managing daily limit tab
class daily_limit{
	constructor(){
		this.today_Limit = document.getElementById("select_limit").value;
	}

  alter_today_lim(today_Limit){
		this.today_Limit = today_Limit;
	}

	change_Today_Balance_amt(){

	    var balance = this.today_Limit - bal.total_Expence ;
	    document.getElementById("rem-balance-amt").innerHTML = "₹"+balance;

	    if (balance <= 0){
	        document.getElementById("rem-balance-amt").style.color = "#FF2E2E";
	    }
	    else{
	      document.getElementById("rem-balance-amt").style.color = "white";
	    }

	    var max = Math.max(food.amt,health.amt,transport.amt,clothes.amt,taxes.amt,entertainment.amt,sports.amt,eating.amt,toiletry.amt);

	    if (max !=0){
	        var max_exp_text = ""

	        if (max == food.amt){
	            max_exp_text += "<br>Food: ₹" + max +"₹";
	        }
	        if (max == health.amt){
	            max_exp_text += "<br>Health: ₹"+ max;
	        }
	        if (max == transport.amt){
	            max_exp_text += "<br>Transport: ₹"+ max;
	        }
	        if (max == clothes.amt){
	            max_exp_text += "<br>Clothes: ₹"+ max;
	        }
	        if (max == taxes.amt){
	            max_exp_text += "<br>taxes: ₹"+ max;
	        }
	        if (max == entertainment.amt){
	            max_exp_text += "<br>Entertainment: ₹"+ max;
	        }
	        if (max == sports.amt){
	            max_exp_text += "<br>Sports: ₹"+ max;
	        }
	        if (max == eating.amt){
	            max_exp_text += "<br>Eating: ₹"+ max;
	        }
	        if (max == toiletry.amt){
	            max_exp_text += "<br>Toiletry: ₹"+ max;
	        }
					document.getElementById("max_exp_text").innerHTML = max_exp_text;
			}
		 document.getElementById("rem-balance-amt").style.animationName = "none";
		 document.getElementById("balance-ani").style.animationName = "none";

			if(this.today_Limit - bal.total_Expence > 0){
							// changing progress bar
							document.getElementById("Daily-exp-bar-rem").style.width = ((this.today_Limit-bal.total_Expence)/this.today_Limit) *100 + "%";
							document.getElementById("Daily-exp-bar-spent").style.width = (bal.total_Expence/this.today_Limit) *100+ "%";

			}
			else{
				this.Balance_alert();
				// changing progress bar
				document.getElementById("Daily-exp-bar-rem").style.width = "0%";
				document.getElementById("Daily-exp-bar-spent").style.width = "100%";
			}

		}



	Balance_alert(){
		  document.getElementById("rem-balance-amt").style.animationName = "blink";
			document.getElementById("balance-ani").style.animationName = "innerborder";
	}

}
//OBJECT for daily Limit
var daily_lim = new daily_limit;



function Check_valid_Inc(){

	  //getting value from the user input
      var inc_mode = document.forms["income-form"]["Income-mode"].value;
      var inc_amt = document.forms["income-form"]["Income-amt"].value;

      inc_amt = inc_amt.toString();


      if(inc_amt === ""){
          inc_err.missing_Entry();
          return false;
      }

      if(inc_mode===""){
          inc_err.missing_Entry();
          return false;
      }

      if ((/\D/.test(inc_amt))){
          inc_err.invalid_entry();
          return false;
      }



      return true;
}

function   Check_valid_Exp(){
      var exp_amt = document.forms["expence-form"]["Expence-amt"].value;
      var exp_mode = document.forms["expence-form"]["Expence-mode"].value;

      exp_amt = exp_amt.toString();


      if(exp_amt === ""){
          exp_err.missing_Entry();
          return false;
      }

      if(exp_mode===""){
        exp_err.missing_Entry();
        return false;
      }

      if (/\D/.test(exp_amt)){
          exp_err.invalid_entry();
          return false;
      }

      return true;
}


// calculating income and expense
function Calc_Inc(){
    if(Check_valid_Inc()){

          var inc_amt = document.forms["income-form"]["Income-amt"].value;
          var inc_mode = document.forms["income-form"]["Income-mode"].value;

          inc_amt = parseInt(inc_amt);

					var n = inc_arr.length;
					var ind = 0;

					for(var i = 0; i<n; i++){
						if(inc_mode == inc_arr[i].title){
							          inc_arr[i].add_amt(inc_amt);
												ind = i;
												break;
						}
					}

					//update history table
					hist_table.update_history(inc_mode,inc_amt,"Income");

					//resetting the error message if any
					inc_err.No_err();

					//changing distributons
					inc_arr[ind].change_dist(inc_amt,inc_mode);

  	}

		//resetting forms
		inc_arr[ind].reset_forms();
}

function Calc_Exp(){

    if(Check_valid_Exp()){

          var exp_amt = document.forms["expence-form"]["Expence-amt"].value;
          exp_amt = parseInt(exp_amt);

          if(parseInt(exp_amt)>bal.balance){
              exp_err.Balance_Err();
          }

          else{
              var exp_mode = document.forms["expence-form"]["Expence-mode"].value;


							var n = exp_arr.length;
							var ind = 0;

							for(var i = 0; i<n; i++){
								if(exp_mode == exp_arr[i].title){
									      exp_arr[i].add_amt(exp_amt);
												ind = i;
												break;
								}
							}

							//update history table
							hist_table.update_history(exp_mode,exp_amt,"Expense");

							//resetting the error message if any
							exp_err.No_err();

							//changing distributons
							exp_arr[ind].change_dist(exp_amt,exp_mode);


          }
    }

		//resetting forms
		exp_arr[ind].reset_forms();

}

function exp_limit_select(){
		today_Limit = document.getElementById("select_limit").value;
		today_Limit = parseInt(today_Limit);

		daily_lim.alter_today_lim(today_Limit);

		daily_lim.change_Today_Balance_amt();
}

function exp_limit_text(){
	today_Limit = document.getElementById("custom_limit").value;

	today_Limit.toString();
	if(today_Limit === ""){
				today_Limit = document.getElementById("select_limit").value;
	}

	//clear the custom input text box
	document.getElementById("custom_limit").value="";

	today_Limit = parseInt(today_Limit);

	daily_lim.alter_today_lim(today_Limit);

	daily_lim.change_Today_Balance_amt();
}

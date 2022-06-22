class form_validity{

    constructor(){
      this.validity = true;
    }

    check_email(){
        var email = document.getElementById("email").value;

        if(email.search("@gmail.com") == -1){
            document.getElementById("err-email").innerHTML = "Please enter Valid E-mail Address";
            this.validity = false;
        }
        else{
            document.getElementById("err-email").innerHTML = "";
            this.validity = true;
        }
    }

    check_password(){
        var pass = document.getElementById("pass").value;
        var spl_char = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;


        if(pass.length < 8){
            document.getElementById("err-pass").innerHTML = "Password Must be atleast 8 characters long";
            this.validity = false;
        }

        else if(spl_char.test(pass) == false){
            document.getElementById("err-pass").innerHTML = "Please use a special character (eg: @/$#.etc)";
            this.validity = false;
        }

        else{
            document.getElementById("err-pass").innerHTML = "";
            this.validity = true;
        }
    }

    check_repeat_password(){
        var rpass = document.getElementById("repeat_pass").value;
        var pass = document.getElementById("pass").value;

        if(pass!==rpass){
                document.getElementById("err-repass").innerHTML = "passwords doesnt match!";
                this.validity = false;
        }
        else{
            document.getElementById("err-repass").innerHTML = "";
            this.validity = true;
        }
    }

    disable_submit(){
      if(this.validity){
        document.getElementById("submit_btn").disabled = false;
      }
      else{
        document.getElementById("submit_btn").disabled = true;
      }
    }

}

var valid = new form_validity;

function fun_email(){
  valid.check_email();
  valid.disable_submit();
}

function fun_pass(){
  valid.check_password();
  valid.disable_submit();
}
function fun_repeat_pass(){
  valid.check_repeat_password();
  valid.disable_submit();
}

function show_pass(){
    var x = document.getElementById("pass");
    var y = document.getElementById("repeat_pass");
    if (x.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
}

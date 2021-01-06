function checkEmail(text){
    return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text))
}
function checkPhone(number){
    return (/^(6|7|8|9)[0-9]{9}$/.test(number));
}
function checkNumber(number){
    return (/^[0-9]{1,}$/.test(number));
}
function checkName(text){
    return (/^[A-Za-z ]+$/.test(text));
}
function checkAddress(text){
    return (/[A-Za-z0-9, ().-]+$/.test(text));
}
function checkPin(number){
    return (/^[0-9]{6}$/.test(number));
}
function checkLand(number){
    return (/^[0-9]{11}$/.test(number));
}


var c=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

function valstuname()
        {
            var hname = document.getElementsByName('stuname')[0];
            if (checkName(hname.value)){
                document.getElementById("stuname").style.borderColor = "green";
                c[0]=1;   
            } 
            else
                {
                   document.getElementById("stuname").style.borderColor = "red";   
                c[0]=0;
                }
                button();
        }





function valstucast()
        {
            var hname = document.getElementsByName('stucast')[0];
            if (checkName(hname.value)){
                document.getElementById("stucast").style.borderColor = "green";
                c[1]=1;   
            } 
            else
                {
                   document.getElementById("stucast").style.borderColor = "red";   
                   c[1]=0;
                }
                button();
        }

function valstunation()
        {
            var hname = document.getElementsByName('stunation')[0];
            if (checkName(hname.value)){
                document.getElementById("stunation").style.borderColor = "green";
                c[2]=1;   
            } 
            else
                {
                   document.getElementById("stunation").style.borderColor = "red";   
                  c[2]=0;
                }
                button();
        }

function valstuwork()
        {
            var hname = document.getElementsByName('stuwork')[0];
            if (checkName(hname.value)){
                document.getElementById("stuwork").style.borderColor = "green";
                c[3]=1;   
            } 
            else
                {
                   document.getElementById("stuwork").style.borderColor = "red";   
                  c[3]=0;
                }
               button();
        }

function valstuPaddr()
    {
        var ha = document.getElementsByName('stupaddr')[0];
            if (checkAddress(ha.value)){
                document.getElementById("stupaddr").style.borderColor = "green";
                c[4]=1; 
            } 
            else
                {
                document.getElementById("stupaddr").style.borderColor = "red"; 
                c[4]=0;
            }
                button();
    } 

function valstuTaddr()
    {
        var ha = document.getElementsByName('stutaddr')[0];
            if (checkAddress(ha.value)){
                document.getElementById("stutaddr").style.borderColor = "green";
                c[5]=1; 
            } 
            else
                {
                document.getElementById("stutaddr").style.borderColor = "red"; 
                c[5]=0;
            }
                button();
    } 

function valstuPin()
    {
        var hp = document.getElementsByName('stupin')[0];
            if (checkPin(hp.value)){
                document.getElementById("stupin").style.borderColor = "green";
                c[6]=1;   
            } 
            else
                {
                document.getElementById("stupin").style.borderColor = "red"; 
                c[6]=0;
            }
                button();
    } 

function valstuTPin()
    {
        var hp = document.getElementsByName('stutpin')[0];
            if (checkPin(hp.value)){
                document.getElementById("stutpin").style.borderColor = "green";
                c[7]=1;   
            } 
            else
                {
                document.getElementById("stutpin").style.borderColor = "red"; 
                c[7]=0;
            }
                button();
    } 

function valstuMob()
{
    var m = document.getElementsByName('stumob')[0];
        if (checkPhone(m.value)){
            document.getElementById("stumob").style.borderColor = "green";
            c[8]=1; 
        } 
        else
            {
            document.getElementById("stumob").style.borderColor = "red"; 
            c[8]=0;
        }
            button();
}      

function valstuEmail()
    {
        var me = document.getElementsByName('stuemail')[0];
        if (checkEmail(me.value)){
            document.getElementById("stuemail").style.borderColor = "green";
            c[9]=1; 
        } 
        else
            {
            document.getElementById("stuemail").style.borderColor = "red"; 
            c[9]=0;
        }
            button();
    }

function valfname()
        {
            var hname = document.getElementsByName('fname')[0];
            if (checkName(hname.value)){
                document.getElementById("fname").style.borderColor = "green";
                c[10]=1;   
            } 
            else
                {
                   document.getElementById("fname").style.borderColor = "red";   
                   c[10]=0;
                }
                button();
        }

function valmname()
        {
            var hname = document.getElementsByName('mname')[0];
            if (checkName(hname.value)){
                document.getElementById("mname").style.borderColor = "green";
                c[11]=1;   
            } 
            else
                {
                   document.getElementById("mname").style.borderColor = "red";   
                   c[11]=0;
                }
                button();
        }

function valfo()
        {
            var hname = document.getElementsByName('fo')[0];
            if (checkName(hname.value)){
                document.getElementById("fo").style.borderColor = "green";
                c[12]=1;   
            } 
            else
                {
                   document.getElementById("fo").style.borderColor = "red";   
                   c[12]=0;
                }
                button();
        }

function valmo()
        {
            var hname = document.getElementsByName('mo')[0];
            if (checkName(hname.value)){
                document.getElementById("mo").style.borderColor = "green";
                c[13]=1;   
            } 
            else
                {
                   document.getElementById("mo").style.borderColor = "red";   
                   c[13]=0;
                }
                button();
        }

function valfmob()
{
    var m = document.getElementsByName('fmob')[0];
        if (checkPhone(m.value)){
            document.getElementById("fmob").style.borderColor = "green";
            c[14]=1; 
        } 
        else
            {
            document.getElementById("fmob").style.borderColor = "red"; 
            c[14]=0;
        }
            button();
}   

function valmmob()
{
    var m = document.getElementsByName('mmob')[0];
        if (checkPhone(m.value)){
            document.getElementById("mmob").style.borderColor = "green";
            c[15]=1; 
        } 
        else
            {
            document.getElementById("mmob").style.borderColor = "red"; 
            c[15]=0;
        }
        button();
} 

function vallname()
        {
            var hname = document.getElementsByName('lname')[0];
            if (checkName(hname.value)){
                document.getElementById("lname").style.borderColor = "green";
                c[16]=1;   
            } 
            else
                {
                   document.getElementById("lname").style.borderColor = "red";   
                   c[16]=0;
                }
                button();
        }

function valgmob()
{
    var m = document.getElementsByName('gmob')[0];
        if (checkPhone(m.value)){
            document.getElementById("gmob").style.borderColor = "green";
            c[17]=1; 
        } 
        else
            {
            document.getElementById("gmob").style.borderColor = "red"; 
            c[17]=0;
        }
        button();
} 

function checkDate() {
     
//     var today = new Date();
//     var dd = today.getDate();
//     var mm = today.getMonth()+1; //January is 0!
//     var yyyy = today.getFullYear();
//    if(dd<10){
//        dd='0'+dd
//    } 
//    if(mm<10){
//        mm='0'+mm
//    } 
//
//     today = yyyy+'-'+mm+'-'+dd;
//     document.getElementById("Sdate").setAttribute("max", today);
//        
     
     
     
    var date = document.getElementById("Sdate").value;
    var ToDate = new Date();
    if(date == "") {
        document.getElementById("Sdate").style.borderColor = "red";
        var today = new Date();
        c[18]=0; 
    }
     else if (new Date(date).getTime() >= ToDate.getTime()) {
         document.getElementById("Sdate").style.borderColor = "red"; 
        c[18]=0; 
        } 
    else
        {
        document.getElementById("Sdate").style.borderColor ="green";
        c[18]=1; 
        }
    button();
    
}


function button()
{
    var l = c.length;
    var s=0;
    for(var i=0;i<l;i++)
    {
        s=s+c[i];
    }
    if(l==s)
    {
        document.getElementById("addStu").disabled = false;
    }
    else
    {
         document.getElementById("addStu").disabled = true;
    }
}


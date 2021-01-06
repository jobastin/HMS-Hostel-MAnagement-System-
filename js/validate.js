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
    return (/[A-Za-z0-9, ()]+$/.test(text));
}
function checkPin(number){
    return (/^[0-9]{6}$/.test(number));
}
function checkLand(number){
    return (/^[0-9]{11}$/.test(number));
}


var c=[0,0,0,0,0,0,0,0,0,0,0,0,0,0];
function valhstlname()
        {
            
            var hname = document.getElementsByName('hstlname')[0];
            if (checkName(hname.value)){
                document.getElementById("hstlname").style.borderColor = "green";
                c[0]=1;   
            } 
            else
                {
                   document.getElementById("hstlname").style.borderColor = "red";
                   document.getElementById("hstlnames").innerHTML = "Paragraph changed!";    
                    c[0]=0;
                }
                button();
        }

function valCapacity()
        {
            var hc = document.getElementsByName('totalcap')[0];
            if (checkNumber(hc.value)){
                document.getElementById("totalcap").style.borderColor = "green";
                c[1]=1;    
            } 
            else
                {
                document.getElementById("totalcap").style.borderColor = "red"; 
                c[1]=0;
                }
                button();
        }

function valhstlEmail()
        {
            var he = document.getElementsByName('hstlemail')[0];
            if (checkEmail(he.value)){
                document.getElementById("hstlemail").style.borderColor = "green";
                c[2]=1;    
            } 
            else
                {
                document.getElementById("hstlemail").style.borderColor = "red"; 
                c[2]=0; 
            }
            button();
        }
function valhstlMob()
    {
        var hm = document.getElementsByName('hstlmob')[0];
            if (checkPhone(hm.value)){
                document.getElementById("hstlmob").style.borderColor = "green";
                c[3]=1;   
            } 
            else
                {
                document.getElementById("hstlmob").style.borderColor = "red"; 
                c[3]=0;
            }
                button();
    }     
function valhstlTele()
    {
        var hm = document.getElementsByName('hstltele')[0];
            if (checkLand(hm.value)){
                document.getElementById("hstltele").style.borderColor = "green";
                c[4]=1;    
            } 
            else
                {
                document.getElementById("hstltele").style.borderColor = "red"; 
                c[4]=0;
            }
                button();
    }      
    


function valhstlAdr()
    {
        var ha = document.getElementsByName('hstlAdr')[0];
            if (checkAddress(ha.value)){
                document.getElementById("hstlAdr").style.borderColor = "green";
                c[5]=1; 
            } 
            else
                {
                document.getElementById("hstlAdr").style.borderColor = "red"; 
                c[5]=0;
            }
                button();
    }      
function valhstlPin()
    {
        var hp = document.getElementsByName('hstlPin')[0];
            if (checkPin(hp.value)){
                document.getElementById("hstlPin").style.borderColor = "green";
                c[6]=1;   
            } 
            else
                {
                document.getElementById("hstlPin").style.borderColor = "red"; 
                c[6]=0;
            }
                button();
    }   
function valMname()
    {
        var mn = document.getElementsByName('Mname')[0];
            if (checkName(mn.value)){
                document.getElementById("Mname").style.borderColor = "green";
                c[7]=1;    
            } 
            else
                {
                document.getElementById("Mname").style.borderColor = "red"; 
                c[7]=0;
            }
                button();
    }   
function valMemail()
    {
        var me = document.getElementsByName('Memail')[0];
        if (checkEmail(me.value)){
            document.getElementById("Memail").style.borderColor = "green";
            c[8]=1; 
        } 
        else
            {
            document.getElementById("Memail").style.borderColor = "red"; 
            c[8]=0;
        }
            button();
    }
function valMmobile()
{
    var m = document.getElementsByName('Mmobile')[0];
        if (checkPhone(m.value)){
            document.getElementById("Mmobile").style.borderColor = "green";
            c[9]=1; 
        } 
        else
            {
            document.getElementById("Mmobile").style.borderColor = "red"; 
            c[9]=0;
        }
            button();
}      
function valMadr()
    {
        var ma = document.getElementsByName('MAdr')[0];
            if (checkAddress(ma.value)){
                document.getElementById("MAdr").style.borderColor = "green";
                c[10]=1; 
            } 
            else
                {
                document.getElementById("MAdr").style.borderColor = "red"; 
                c[10]=0;
                }
                button();
    }      
function valMpin()
    {
        var mp = document.getElementsByName('Mpin')[0];
            if (checkPin(mp.value)){
                document.getElementById("Mpin").style.borderColor = "green";
                c[11]=1; 
            } 
            else
                {
                document.getElementById("Mpin").style.borderColor = "red"; 
                c[11]=0;
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
        document.getElementById("reg").disabled = false;
    }
    else
    {
         document.getElementById("reg").disabled = true;
    }
}



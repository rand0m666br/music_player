// Heitor

let pMsg = document.getElementById("p_msg");
function login(){
    let email = document.getElementById("emailLogin");
    let senha = document.getElementById("senhaLogin");

    const dados = {
        email,
        senha,
    };

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'cadastro.php?acao=login');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = () => {
        if (xhr.status === 200){
            window.location = "../index.php";
        }else {
            alert("erro");
        }
    };
    xhr.send(JSON.stringify(dados));

}
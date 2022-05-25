// variablerna för textboxen där man skriver meddelandena
var textbox = document.getElementById("textbox");
var message = document.getElementById("Messages");

// Arrays där meddelandena samt username sparas
let MsgArr = []
let UsernameArr = []
function getMessages() {
    i = 0

    $.ajax({
        url: "data.php",
        type: "get", 
        dataType: "JSON",
        data: {}, //Används för att skicka datan till servern
        success: function(res)
        {
            console.log(res); //Visar datan
            console.log(res.length); //Ser längden hos datan

            while (i < res.length) {
                    MsgArr[i] = ("[" + res[i]["username"] + "] " + res[i]['messagesent']);  // Varje index i MsgArr har en username och messagesent.
                i += 1
            }
            console.log(MsgArr)
        }
    })
    
}
// Indexen hos arrayn (MsgArr)skickas på skärmen som ett meddelande
async function createElement() {
    await new Promise(r => setTimeout(r, 100));
    i = MsgArr.length
    console.log('ee')
    console.log(MsgArr.length)
    while (i >= 0) {
        const list = document.createElement('li');
        list.innerText = MsgArr[i];
        message.appendChild(list);
        i -= 1;
    }
};

createElement()
getMessages()


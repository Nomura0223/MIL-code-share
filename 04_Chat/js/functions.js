function addMsg(msg, key) {
    let h = "";
    if (msg.uname == "user") {
        h += `<div id=${key} class="message-container-user">`
        h += `<p class="message user-message">`;
    } else {
        h += `<div id=${key} class="message-container">`
        h += `<img src="imgs/${msg.uname}.png" alt="" class="user-icon">`
        h += `<p class="message other-message">`;
        h += `<span class="uname">${msg.uname}:</span><br>`
    }
    // h += `<span class="uname">${msg.uname}:</span><br>`　// ユーザー名表示
    h += `<span contentEditable="true" id=${key}_update>
                    ${msg.text}</span>`
    h += `<span class="update" data-key=${key}> 🔄</span>
            <span class="remove" data-key=${key}>🗑️</span>
            </p></div>`;
    $("#output").append(h);
}
export { addMsg };
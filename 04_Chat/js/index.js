// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
import { getDatabase, ref, push, set, update, onChildAdded, remove, onChildRemoved, onChildChanged }
    from "https://cdnjs.cloudflare.com/ajax/libs/firebase/10.7.1/firebase-database.js";
import { addMsg } from "./functions.js";

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyAmz_KrrKcxCSuU6sr3LdvyEYRXX5tNAuQ",
    authDomain: "fir-demo-72eda.firebaseapp.com",
    projectId: "fir-demo-72eda",
    storageBucket: "fir-demo-72eda.appspot.com",
    messagingSenderId: "438152391742",
    appId: "1:438152391742:web:804c5e342972e45a4eb56f"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

// データベースの参照を作成
const db = getDatabase(app);
const dbRef = ref(db, "chat");

// データベースにデータを送信
$("#send").on("click", function () {
    const msg = {
        uname: $("#user").val(),
        text: $("#text").val()
    }
    const newPostRef = push(dbRef);
    set(newPostRef, msg);
});

// データが追加された時の処理
onChildAdded(dbRef, function (data) {
    const msg = data.val();
    const key = data.key;
    addMsg(msg, key);
});

// データベースからデータを削除
$("#output").on("click", ".remove", function () {
    const key = $(this).attr("data-key");
    const chatRef = ref(db, "chat/" + key);
    console.log("remove:" + chatRef);
    remove(chatRef);
});

// データベースからデータを削除した時の処理
onChildRemoved(dbRef, function (data) {
    const key = data.key;
    $("#" + key).remove();
});

// データベースのデータを更新
$("#output").on("click", ".update", function () {
    const key = $(this).attr("data-key");
    const chatRef = ref(db, "chat/" + key);
    update(chatRef, {
        text: $("#" + key + "_update").html()
    });
});

// データベースのデータを更新した時の処理
onChildChanged(dbRef, function (data) {
    const key = data.key;
    const msg = data.val();
    $("#" + key + "_update").html(msg.text);
});
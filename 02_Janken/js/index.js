class Janken {
    constructor() {
        this.pc_hand = "";
        this.my_hand = "";
        this.judgement = "";
        this.pc_score = 0;
        this.my_score = 0;
        this.draw_score = 0;
    }

    setMyHand(my_hand) {
        this.my_hand = my_hand;
    }

    setPcHand() {
        let r = Math.floor(Math.random() * 3);
        let hands = ["グー", "チョキ", "パー"];
        this.pc_hand = hands[r];

        // 画像の切り替え　Tobe: ここはswitchImage()という関数にしたい
        switch (this.pc_hand) {
            case "グー":
                // htmlの枠を
                $("#pc_gu_btn").fadeIn(0);
                $("#pc_cho_btn").fadeOut(0);
                $("#pc_par_btn").fadeOut(0);
                break;
            case "チョキ":
                $("#pc_gu_btn").fadeOut(0);
                $("#pc_cho_btn").fadeIn(0);
                $("#pc_par_btn").fadeOut(0);
                break;
            case "パー":
                $("#pc_gu_btn").fadeOut(0);
                $("#pc_cho_btn").fadeOut(0);
                $("#pc_par_btn").fadeIn(0);
                break;
        }
    }

    judge() {
        if (this.my_hand == this.pc_hand) {
            this.judgement = "あいこ";
            this.draw_score++;
        } else if (this.my_hand == "グー" & this.pc_hand == "チョキ") {
            this.judgement = "勝ち";
            this.my_score++;
        } else if (this.my_hand == "グー" & this.pc_hand == "パー") {
            this.judgement = "負け";
            this.pc_score++;
        } else if (this.my_hand == "チョキ" & this.pc_hand == "パー") {
            this.judgement = "勝ち";
            this.my_score++;
        } else if (this.my_hand == "チョキ" & this.pc_hand == "グー") {
            this.judgement = "負け";
            this.pc_score++;
        } else if (this.my_hand == "パー" & this.pc_hand == "グー") {
            this.judgement = "勝ち";
            this.my_score++;
        } else if (this.my_hand == "パー" & this.pc_hand == "チョキ") {
            this.judgement = "負け";
            this.pc_score++;
        }
    }

    getJudgeImage(judgement) {
        if (judgement == "勝ち") {
            return "<img class='result' src='img/win.png' alt='勝ち'>";
        } else if (judgement == "負け") {
            return "<img class='result' src='img/lose.png' alt='負け'>";
        } else if (judgement == "あいこ") {
            return "<img class='result' src='img/even2.png' alt='あいこ'>";
        }
    }

    getMyHand() {
        return this.my_hand;
    }

    getPcHand() {
        return this.pc_hand;
    }

    getJudgement() {
        return this.judgement;
    }

    getMyScore() {
        return this.my_score;
    }

    getPcScore() {
        return this.pc_score;
    }

    getDrawScore() {
        return this.draw_score;
    }
}


// クリックした時の処理の関数
function onMyHandClick(my_hand) {
    janken.setMyHand(my_hand);
    janken.setPcHand();
    janken.judge();
    $("#judgement").html(janken.getJudgeImage(janken.getJudgement()));
    $("#my_score").html(janken.getMyScore());
    $("#pc_score").html(janken.getPcScore());
    $("#draw_score").html(janken.getDrawScore());
}

// インスタンスを生成 
let janken = new Janken();

// グーをクリックした時の処理
$("#gu_btn").on("click", function () {
    onMyHandClick("グー");
});

// チョキをクリックした時の処理
$("#cho_btn").on("click", function () {
    onMyHandClick("チョキ");
});

// パーをクリックした時の処理
$("#par_btn").on("click", function () {
    onMyHandClick("パー");
});
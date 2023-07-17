// function openOTPmodal() {
//     window.location.href = '{{url("otpverification")}}';
// }

// function onOTPverification() {
//     alert("OTP Verified Successfully. Please Login")
// }

$(document).ready(function () {
    $("#navbar-search-input").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTable td").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});



///////////////
const quizData = [{
    question: "Which one of the following is not a prime number?",
    a: "31",
    b: "61",
    c: "71",
    d: "91",
    correct: "d",
},
{
    question: "What least number must be added to 1056, so that the sum is completely divisible by 23 ?",
    a: "2",
    b: "3",
    c: "18",
    d: "21",
    correct: "a",
},
{
    question: "1397 x 1397 = ?",
    a: "1951609",
    b: "1981709",
    c: "18362619",
    d: "2031719",
    correct: "a",
},
{
    question: "How many of the following numbers are divisible by 132?<br>264, 396, 462, 792, 968, 2178, 5184, 6336",
    a: "3",
    b: "4",
    c: "6",
    d: "7",
    correct: "b",
}
];
let index = 0;
let correct = 0,
    incorrect = 0,
    total = quizData.length;
let questionBox = document.getElementById("questionBox");
let allInputs = document.querySelectorAll("input[type='radio']")
const loadQuestion = () => {

    if (total === index) {
        return quizEnd()

    }
    reset()
    const data = quizData[index]
    questionBox.innerHTML = `${index + 1}) ${data.question}`
    allInputs[0].nextElementSibling.innerText = data.a
    allInputs[1].nextElementSibling.innerText = data.b
    allInputs[2].nextElementSibling.innerText = data.c
    allInputs[3].nextElementSibling.innerText = data.d

}

document.querySelector("#submit").addEventListener(
    "click",
    function () {
        const data = quizData[index]
        const ans = getAnswer()
        console.log(data.correct)
        if (ans === data.correct) {
            correct++;
        } else {
            incorrect++;
        }
        index++;
        loadQuestion()
    }
)

const getAnswer = () => {
    let ans;
    allInputs.forEach(
        (inputEl) => {
            if (inputEl.checked) {
                ans = inputEl.value;
                console.log(ans);
            }
        }
    )
    return ans;
}

const reset = () => {
    allInputs.forEach(
        (inputEl) => {
            inputEl.checked = false;
        }
    )
}

const quizEnd = () => {
    // console.log(document.getElementsByClassName("container"));
    document.getElementsByClassName("contnr")[0].innerHTML = `
        <div class="col text-center">
        
            <h3 class="w-100 "> Hii,<br> you've scored ${correct} / ${total} </h3><br><br>
            <img src="assets/images/icons8-target.gif" width="100" height="100"><br><br>

             <a class="btn btn-primary" href="testPractice.html">Retake</a>
             
        </div>

         
    `
}
loadQuestion(index);












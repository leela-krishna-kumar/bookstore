let displayNumber = document.querySelector("#dialed-input input");
const dialPads = [].slice.call(document.querySelectorAll("#dial-pad .num"));
const callBtn = document.getElementById("call-btn");
const deleteBtn = document.getElementById("del-btn");
const modal = document.getElementById("modal");
const closeModalBtn = document.getElementById("close");
const message = document.getElementById("message");
const modalPhoneIcon = document.querySelector("#modal .fa-phone");
let phoneNumber = [];

// FUNCTIONS
function dialNumber() {
    phoneNumber.push(this.querySelector("h2").innerText);
    if (phoneNumber.length >= 11) {
        return false;
    }
    displayNumber.value = `${phoneNumber.join("")}`;
}

function contactForm() {

    return {
        message: "",

        submitData() {
            this.message = "";

            fetch("/api/contact", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.head.querySelector(
                        "meta[name=csrf-token]"
                    ).content,
                },
                dialed_number: displayNumber.value,
            })
                .then(response => {
                    this.message = displayNumber.value + " sucessfully submitted!";
                    //  console.log("123");

                    if (response.status == 200) {
                        if (displayNumber.value.length !== 10) {
                            message.innerText = "Enter a phone number";
                            modalPhoneIcon.style.display = "none";
                            modal.classList.add("display");
                        } else {
                            // DISPLAY DIALED NUMBER
                            message.innerText = `You dialed number ${displayNumber.value}`;
                            modal.classList.add("display");
                            modalPhoneIcon.style.display = "";
                        }

                        console.log(response.status, response.ok); // 200 true
                    }else{
                         message.innerText = "Unsuccessful request";
                         modalPhoneIcon.style.display = "none";
                         modal.classList.add("display");

                        console.log(response.status, response.ok); // 404 false
                    }
                })

                // .then((response) => {
                //     console.log(response.status, response.ok); // 404 false
                // })

                .catch(() => {
                    this.message = "Ooops! Something went wrong!";
                });
        },
    };
}

dialPads.map((dialpad) => dialpad.addEventListener("click", dialNumber));

//callBtn.addEventListener("click", CallNumber);

// CLOSE MODAL
closeModalBtn.addEventListener("click", function () {
    modal.classList.remove("display");
});

// TODO: ADD DELETE BUTTON


/*

$.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",

        url: "/api/contact",

        data: {
            dialed_number: displayNumber.value,
        },
        success: function (data) {
            if (displayNumber.value.length !== 10) {
                        message.innerText = "Enter a phone number";
                        modalPhoneIcon.style.display = "none";
                        modal.classList.add("display");
                    } else {
                        // DISPLAY DIALED NUMBER
                        message.innerText = `You dialed number ${displayNumber.value}`;
                        modal.classList.add("display");
                        modalPhoneIcon.style.display = "";
                    }
        },
    });

    */

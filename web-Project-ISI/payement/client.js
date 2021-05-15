// A reference to Stripe.js initialized with your real test publishable API key.
var stripe = Stripe("pk_test_51IqdUVGpFYvTwmSor6jY1btwMxFkuW4SzEU3BUi8BuVtBNxxQJPysJpKzDRp2K53oDWYkW36FdqVr1Rvb7lBOZQv00OaujUsc9");

// Get Fields Fields
const total_price = document.getElementById("total_price").value
const cart_items = document.getElementById("all_items").value
const firstName = document.getElementById("firstName").value
const lastName = document.getElementById("lastName").value
const email = document.getElementById("email").value
const address = document.getElementById("address").value
const address2 = document.getElementById("address2").value
const country = document.getElementById("country").value
const zip = document.getElementById("zip").value
const state = document.getElementById("state").value
const user_id = document.getElementById("user_id").value
const form_init = document.getElementById("credit-from")  

const payWithCreditCard = ()=>{
      //Set form html
      const form = document.getElementById("credit-from")
      form.innerHTML = `<div id="card-element"><!--Stripe.js injects the Card Element--></div>
      <button id="submit">
        <div class="spinner hidden " id="spinner"></div>
        <span id="button-text">Pay now</span>
      </button>
      <p id="card-error" role="alert"></p>
      <p class="result-message hidden">
        Payment succeeded, see the result in your
        <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
      </p>`
    
      // The items the customer wants to buy
      var purchase = {
        total_price: parseInt(total_price)*100,
        firstName,
        lastName,
        email,
        address,
        address2,
        zip,
        country,
        state,
        user_id
      };
      
  
      // Disable the button until we have Stripe set up on the page
      document.querySelector("button").disabled = true;
      fetch("./create.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(purchase)
      })
        .then(function(result) {
          return result.json();
        })
        .then(function(data) {
          var elements = stripe.elements();
    
          var style = {
            base: {
              color: "#32325d",
              fontFamily: 'Arial, sans-serif',
              fontSmoothing: "antialiased",
              fontSize: "16px",
              "::placeholder": {
                color: "#32325d"
              }
            },
            invalid: {
              fontFamily: 'Arial, sans-serif',
              color: "#fa755a",
              iconColor: "#fa755a"
            }
          };
    
          var card = elements.create("card", { style: style });
          // Stripe injects an iframe into the DOM
          card.mount("#card-element");
    
          card.on("change", function (event) {
            // Disable the Pay button if there are no card details in the Element
            document.querySelector("button").disabled = event.empty;
            document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
          });
    
          var form = document.getElementById("payment-form");
          form.addEventListener("submit", function(event) {
            event.preventDefault();
            // Complete payment when the submit button is clicked
            payWithCard(stripe, card, data.clientSecret);
          });
        });
    
      // Calls stripe.confirmCardPayment
      // If the card requires authentication Stripe shows a pop-up modal to
      // prompt the user to enter authentication details without leaving your page.
      var payWithCard = function(stripe, card, clientSecret) {
        loading(true);
        stripe
          .confirmCardPayment(clientSecret, {
            payment_method: {
              card: card
            }
          })
          .then(function(result) {
            if (result.error) {
              // Show error to your customer
              showError(result.error.message);
            } else {
              // The payment succeeded!
              orderComplete(result.paymentIntent.id);
            }
          });
      };
    
      /* ------- UI helpers ------- */
    
      // Shows a success message when the payment is complete
      var orderComplete = function(paymentIntentId) {
        loading(false);
        document
          .querySelector(".result-message a")
          .setAttribute(
            "href",
            "https://dashboard.stripe.com/test/payments/" + paymentIntentId
          );
        document.querySelector(".result-message").classList.remove("hidden");
        document.querySelector("button").disabled = true;
      };
    
      // Show the customer the error from Stripe if their card fails to charge
      var showError = function(errorMsgText) {
        loading(false);
        var errorMsg = document.querySelector("#card-error");
        errorMsg.textContent = errorMsgText;
        setTimeout(function() {
          errorMsg.textContent = "";
        }, 4000);
      };
    
      // Show a spinner on payment submission
      var loading = function(isLoading) {
        if (isLoading) {
          // Disable the button and show a spinner
          document.querySelector("button").disabled = true;
          document.querySelector("#spinner").classList.remove("hidden");
          document.querySelector("#button-text").classList.add("hidden");
        } else {
          document.querySelector("button").disabled = false;
          document.querySelector("#spinner").classList.add("hidden");
          document.querySelector("#button-text").classList.remove("hidden");
        }
      };
}

const payOnShipping = ()=>{
  const init_form = document.getElementById("payment-form")
  init_form.method = "POST"
  init_form.action = "./payment_shipping.php"
}

const fn =()=>{
  const shipping_from = document.getElementById("shipping-from")
  const credit_form = document.getElementById("credit-from")
  shipping_from.classList.toggle("d-none")
  credit_form.classList.toggle("d-none")

  if ($("input[type='radio'][name='paymentMethod']:checked").val() === "Credit"){
    console.log("credit")
    payWithCreditCard()
  }else{
    console.log("ship")

    payOnShipping()
  }
}



$('input[name="paymentMethod"]').on("click", function(e){
  fn()
})

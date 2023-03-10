'use strict';


const outputYou = document.querySelector('.output-you');
const outputBot = document.querySelector('.output-bot');

const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const recognition = new SpeechRecognition();

const synth = window.speechSynthesis;
const utterance = new SpeechSynthesisUtterance();

//recognition.lang = "";
recognition.interimResults = false;
recognition.maxAlternatives = 1;




document.getElementById('microphone').addEventListener('click', () => {
  //recognition.stop();
  recognition.start();
  document.getElementById("microphone").style.background='#fff';
  synth.cancel(); // utterance1 stops being spoken immediately, and both are removed from the queue	
});

recognition.addEventListener('audiostart', () => {
  console.log('Audio capturing started');
  document.getElementById("microphone").style.background='#E70104';
});

recognition.addEventListener('speechstart', () => {
  console.log('Speech has been detected.');
  
});

recognition.addEventListener('result', (e) => {
  console.log('Result has been detected.');

  let last = e.results.length - 1;
  let text = e.results[last][0].transcript;

  outputYou.textContent = text;
  console.log('Confidence: ' + e.results[0][0].confidence);
  // Disabling a button
  document.getElementById("microphone").disabled = true;
  document.getElementById("microphone").style.background='#FFFFFF';  
  sendmsg(text);

  //outputBot.textContent = replyText;
});

recognition.addEventListener('speechend', () => {
  recognition.stop();
  document.getElementById("microphone").style.background='#3BC4C9';
});

recognition.addEventListener('error', (e) => {
  outputBot.textContent = 'Error: ' + e.error +"  You can ask me question when button color is red.";
  recognition.stop();
  document.getElementById("microphone").style.background='#3BC4C9';
});

recognition.addEventListener('audioend', () => {
  console.log('Audio capturing ended');
  document.getElementById("microphone").style.background='#3BC4C9';
});


function synthVoice(text) {

  utterance.text = text;
  synth.speak(utterance);

  //if(replyText == '') replyText = '(No answer...)';
  outputBot.textContent = text;
}

function sendmsg(question){
          // Send the speech input to the PHP script
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "transcribe.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        //var question = document.getElementById("textBox").value; //"What's news today?";
        xhr.send("text=" + question);
        console.log("question=" +question);
        
        //var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
            	// Get the text output from the PHP script
            	var response = JSON.parse(this.responseText);
            	var output = response.choices[0].text;
            	// Enabling a disabled button to enable it again
            	document.getElementById("microphone").disabled = false;
            	document.getElementById("microphone").style.background='#3BC4C9';
            	console.log(output);
            	synthVoice(output);
        	}
        }	
}


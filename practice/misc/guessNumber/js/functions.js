      // Your JavaScript goes here
      var randomNumber = Math.floor(Math.random() * 99) + 1;
      var guesses = document.querySelector('#guesses');
      var lastResult = document.querySelector('#lastResult');
      var lowOrHi = document.querySelector('#lowOrHi');

      var guessSubmit = document.querySelector('.guessSubmit');
      var guessField = document.querySelector('.guessField');
    
      var guessCount = 1;
      var resetButton = document.querySelector('#reset');
      resetButton.style.display = 'none';
      guessField.focus();
      
      var gamesWon = 0;
      var gamesLost = 0;
      var gameOver;
      var win;
      var won = document.querySelector('#won');
      var lost = document.querySelector('#lost');
      
      function checkGuess() {
            var userGuess = Number(guessField.value);
            if (guessCount === 1) {
                guesses.innerHTML = 'Previous guesses: ';
            }
            guesses.innerHTML += userGuess + ' ';
            
              if (userGuess === randomNumber) {
                lastResult.innerHTML = 'Congratulations! You got it right!';
                lastResult.style.backgroundColor = 'green';
                lowOrHi.innerHTML = '';
                gameOver = true;
                win = true;
                score();
                setGameOver();
              }else if (userGuess > 99) {
                lastResult.innerHTML = 'Guess is above 99!';
                lastResult.style.backgroundColor = 'yellow';
              }else if (isNaN(userGuess)) {
                lastResult.innerHTML = 'Guess is not a number!!';
                lastResult.style.backgroundColor = 'orange';
              }else if (guessCount === 7) {
                lastResult.innerHTML = 'Sorry, you lost!';
                gameOver = true;
                win = false;
                score();
                setGameOver();
              } else {
                lastResult.innerHTML = 'Wrong!';
                lastResult.style.backgroundColor = 'red';
                if(userGuess < randomNumber) {
                  lowOrHi.innerHTML = 'Last guess was too low!';
                } else if(userGuess > randomNumber) {
                  lowOrHi.innerHTML = 'Last guess was too high!';
                }
                gameOver = false;
                setGameOver();
                guessCount++;
              }
             
              //
              guessField.value = '';
              guessField.focus();
      }
      
      guessSubmit.addEventListener('click', checkGuess);
      
      function setGameOver() {
        if(gameOver === true){
            guessField.disabled = true;
            guessSubmit.disabled = true;
            resetButton.style.display = 'inline';
            resetButton.addEventListener('click', resetGame);
        }else if(gameOver === false) {
            guessField.disabled = false;
            guessSubmit.disabled = false;
            resetButton.style.display = 'inline';
            resetButton.addEventListener('click', resetGame);
        }
      }
      
      function resetGame() {
        guessCount = 1;
      
        var resetParas = document.querySelectorAll('.resultParas p');
        for (var i = 0 ; i < resetParas.length ; i++) {
          resetParas[i].textContent = '';
        }
      
        resetButton.style.display = 'none';
      
        guessField.disabled = false;
        guessSubmit.disabled = false;
        guessField.value = '';
        guessField.focus();
      
        lastResult.style.backgroundColor = 'white';
      
        randomNumber = Math.floor(Math.random() * 99) + 1;
    }
    function score(){
       if(win === true){
        gamesWon++;
       }else if (win === false){
        gamesLost++;
       }
       won.innerHTML = 'Games Won: ' + gamesWon;
       lost.innerHTML = 'Games Lost: ' + gamesLost;
    }
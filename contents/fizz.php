<?php
    if(isset($_POST['submit'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : 'David';
        $start = isset($_POST['start']) ? $_POST['start'] : 1;
        $end = isset($_POST['end']) ? $_POST['end'] : 111; // Changed default ending number to 111
        $fizz_word = isset($_POST['fizz_word']) ? $_POST['fizz_word'] : 'fizz';
        $fizz_num = isset($_POST['fizz_num']) ? $_POST['fizz_num'] : 3;
        $buzz_word = isset($_POST['buzz_word']) ? $_POST['buzz_word'] : 'buzz';
        $buzz_num = isset($_POST['buzz_num']) ? $_POST['buzz_num'] : 5;
        $bang_word = isset($_POST['bang_word']) ? $_POST['bang_word'] : 'bang';
        $bang_num = isset($_POST['bang_num']) ? $_POST['bang_num'] : 7;
    ?>

    <h2>FizzBuzzBang Application</h2>
    <img src="images/2.png" alt="image 2">
    

    <div class="container">
        <div class="form-container">
            <!-- Form -->
            <form method="post" action=""><br><br>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'David'; ?>"><br><br>
                <label for="start">Starting Number:</label>
                <input type="number" id="start" name="start" value="<?php echo isset($_POST['start']) ? $_POST['start'] : 1; ?>"><br><br> 
                <label for="end">Ending Number:</label>
                <input type="number" id="end" name="end" value="<?php echo isset($_POST['end']) ? $_POST['end'] : 105; ?>"><br><br> 
                <label for="fizz_word">Word for Fizz:</label>
                <input type="text" id="fizz_word" name="fizz_word" value="<?php echo isset($_POST['fizz_word']) ? htmlspecialchars($_POST['fizz_word']) : 'fizz'; ?>"><br><br>
                <label for="fizz_num">Number for Fizz:</label>
                <input type="number" id="fizz_num" name="fizz_num" value="<?php echo isset($_POST['fizz_num']) ? $_POST['fizz_num'] : 3; ?>"><br><br>
                <label for="buzz_word">Word for Buzz:</label>
                <input type="text" id="buzz_word" name="buzz_word" value="<?php echo isset($_POST['buzz_word']) ? htmlspecialchars($_POST['buzz_word']) : 'buzz'; ?>"><br><br>
                <label for="buzz_num">Number for Buzz:</label>
                <input type="number" id="buzz_num" name="buzz_num" value="<?php echo isset($_POST['buzz_num']) ? $_POST['buzz_num'] : 5; ?>"><br><br>
                <label for="bang_word">Word for Bang:</label>
                <input type="text" id="bang_word" name="bang_word" value="<?php echo isset($_POST['bang_word']) ? htmlspecialchars($_POST['bang_word']) : 'bang'; ?>"><br><br>
                <label for="bang_num">Number for Bang:</label>
                <input type="number" id="bang_num" name="bang_num" value="<?php echo isset($_POST['bang_num']) ? $_POST['bang_num'] : 7; ?>"><br><br>
                <input type="submit" name="submit" value="Generate Results">
            </form>
        </div>

        <div class="result-container">
        
            <!-- Results -->
            <h4>Hello, <?php echo $name; ?>!</h4>
            <p>Your results are:</p>
            <div class="result">
                <?php
                for ($i = $start; $i <= $end; $i++) {
                    $output = '';
                    if ($i % $fizz_num == 0) {
                        $output .= $fizz_word;
                    }
                    if ($i % $buzz_num == 0) {
                        $output .= $buzz_word;
                    }
                    if ($i % $bang_num == 0) {
                        $output .= $bang_word;
                    }
                    if ($output === '') {
                        $output = $i;
                    }
                    echo $output . "<br>";
                }
                ?>
            </div>
        </div>
    </div>

    <?php 
    } else {
    ?>
    <h2>FizzBuzzBang Application</h2>
    <img src="images/2.png" alt="image 2">
    

    <!-- Form -->
    
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'David'; ?>"><br><br>
        <label for="start">Starting Number:</label>
        <input type="number" id="start" name="start" value="<?php echo isset($_POST['start']) ? $_POST['start'] : 1; ?>"><br><br> 
        <label for="end">Ending Number:</label>
        <input type="number" id="end" name="end" value="<?php echo isset($_POST['end']) ? $_POST['end'] : 111; ?>"><br><br> 
        <label for="fizz_word">Word for Fizz:</label>
        <input type="text" id="fizz_word" name="fizz_word" value="<?php echo isset($_POST['fizz_word']) ? htmlspecialchars($_POST['fizz_word']) : 'fizz'; ?>"><br><br>
        <label for="fizz_num">Number for Fizz:</label>
        <input type="number" id="fizz_num" name="fizz_num" value="<?php echo isset($_POST['fizz_num']) ? $_POST['fizz_num'] : 3; ?>"><br><br>
        <label for="buzz_word">Word for Buzz:</label>
        <input type="text" id="buzz_word" name="buzz_word" value="<?php echo isset($_POST['buzz_word']) ? htmlspecialchars($_POST['buzz_word']) : 'buzz'; ?>"><br><br>
        <label for="buzz_num">Number for Buzz:</label>
        <input type="number" id="buzz_num" name="buzz_num" value="<?php echo isset($_POST['buzz_num']) ? $_POST['buzz_num'] : 5; ?>"><br><br>
        <label for="bang_word">Word for Bang:</label>
        <input type="text" id="bang_word" name="bang_word" value="<?php echo isset($_POST['bang_word']) ? htmlspecialchars($_POST['bang_word']) : 'bang'; ?>"><br><br>
        <label for="bang_num">Number for Bang:</label>
        <input type="number" id="bang_num" name="bang_num" value="<?php echo isset($_POST['bang_num']) ? $_POST['bang_num'] : 7; ?>"><br><br>
        <input type="submit" name="submit" value="Generate Results">
    </form>

    <?php } ?>
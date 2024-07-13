<?php
    $result = 0;
    $data = $_POST;
    if (!empty($data)) {
        $action = $data["calculate-action"];
        $displayData = $data["displayData"];


        if ($data["calcData"]) {
            $calcData = explode(",", $data["calcData"]);

            for($i = 0; $i < count($calcData); ++$i) {
                if (strcmp($action, "Addition")  == 0) {
                    $result += $calcData[$i];
                }
                if (strcmp($action, "Subtract") == 0) {
                    echo $action;
                    $result = $result - $calcData[$i];
                }
                if (strcmp($action, "Multiply")  == 0) {
                    $result = $result * $calcData[$i];
                }
                if (strcmp($action, "Divide")  == 0) {
                    if($i == 0) {
                        $result = $calcData[$i];
                    } else {
                        $result = $result / $calcData[$i];
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>

    <style>
        body {
            height: 100vh;
            width: 100%;
            display: grid;
            place-items: center;
        }

        .wrapper {
            text-align: center;
        }

        .calculator {
            text-align: left;
            padding: 10px;
            border-radius: 15px;
            border-color: gray;
            border-style: solid;
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
            gap: 10px;
        }

        .m-grid {
            margin-top: 10px;
            margin-bottom: 10px;
            display: grid;
            width: fit-content;
            grid-template-columns: auto auto auto;
            gap: 5px;
        }

        .m-grid input {
            width: 40px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <h1>My php calculator</h1>
        <form action="index.php" method="POST" class="calculator">
            <select name="calculate-action" id="calculationAction">
                <?php
                function calculateDefaultSelect($optionValue)
                {
                    if (!empty($_POST["calculate-action"] == $optionValue)) {
                        return true;
                    } else {
                        return false;
                    }
                }
                ?>

                <option <?php if (calculateDefaultSelect("Addition")) {
                            echo "selected";
                        } ?> value="Addition">Add</option>
                <option <?php if (calculateDefaultSelect("Subtract")) {
                            echo "selected";
                        } ?> value="Subtract">Subtract</option>
                <option <?php if (calculateDefaultSelect("Multiply")) {
                            echo "selected";
                        } ?> value="Multiply">Multiply</option>
                <option <?php if (calculateDefaultSelect("Divide")) {
                            echo "selected";
                        } ?> value="Divide">Divide</option>
            </select>
            <input type="text" value="" id="calcDisplay" name="displayData">
            <input type="text" value="" hidden placeholder="No value" id="calcData" name="calcData">
            <div class="m-grid" id="buttonContainer">
                <input type="button" value="1">
                <input type="button" value="2">
                <input type="button" value="3">
                <input type="button" value="4">
                <input type="button" value="5">
                <input type="button" value="6">
                <input type="button" value="7">
                <input type="button" value="8">
                <input type="button" value="9">
            </div>
            <button type="submit">Calculate</button>

            <div>
                <span>Result:</span>
                <span>
                    <?php
                    echo $result;
                    ?>
                </span>
            </div>
        </form>
    </div>



    <script>
        const buttonContainer = $("#buttonContainer");
        const action = $("#calculationAction");
        const calculateData = $("#calcData");
        const displayData = $("#calcDisplay");
        let optionValue = "";
        const delimiterMap = new Map();
        delimiterMap.set("Addition", "+");
        delimiterMap.set("Subtract", "-");
        delimiterMap.set("Multiply", "*");
        delimiterMap.set("Divide", "/");

        if (action && action.val() != "") optionValue = action.val();

        function SetCalculate(value, action) {
            if (value != "") {
                if (displayData.val() != undefined && displayData.val() != "") {
                    const newValue = `${displayData.val()} ${delimiterMap.get(action)} ${value}`;
                    const toServerData = `${calculateData.val()},${value}`
                    displayData.val(newValue);
                    calculateData.val(toServerData);
                } else {
                    displayData.val(value)
                    calculateData.val(value)
                }
            }
        }

        if (buttonContainer) {
            buttonContainer.children().each((index, element) => {
                element.addEventListener("click", (e) => {
                    const value = e.srcElement.value;
                    SetCalculate(value, optionValue)
                })
            });
        }
    </script>
</body>

</html>
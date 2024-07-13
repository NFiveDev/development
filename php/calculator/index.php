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
            <input type="text" value="" placeholder="No value" id="calcData">
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
                    <?php ?>
                </span>
            </div>
        </form>


    </div>

    <?php
    $data = $_POST;
    if (!empty($data)) {
        echo $data["calculate-action"];
    }
    ?>

    <script>
        const buttonContainer = $("#buttonContainer");
        const action = $("#calculationAction");
        const calculateData = $("#calcData");
        let optionValue = "";
        if (action && action.val() != "") optionValue = action.val();

        function SetCalculate(value, action) {
            console.log(value)
            console.log(action)
            if (calculateData.val != "") {

            } else {
                debugger;
                calculateData.val(value)
            }
        }

        if (buttonContainer) {
            buttonContainer.children().each((index, element) => {
                element.addEventListener("click", (e) => {
                    const value = e.srcElement.value;
                    
                    SetCalculate(value, action.val())
                })
            });
        }
    </script>
</body>

</html>
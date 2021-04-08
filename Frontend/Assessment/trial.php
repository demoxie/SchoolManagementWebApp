<!DOCTYPE html>
<html>
<body>

<h2>JavaScript Array.forEach()</h2>

<p>Calls a function once for each array element.</p>

<p id="demo"></p>

<script>
    let ordinal_Array = {};
    const numbers = [45, 4, 9, 16, 25];
    numbers.sort((a, b) => a - b);
    numbers.forEach(myFunction);
    if (ordinal_Array.hasOwnProperty(4)) {
        alert(ordinal_Array[45]);

    } else {
        alert("no such value");
    }

    // alert(JSON.stringify(ordinal_Array[4]));

    function myFunction(value, index, array) {
        let n = Number(index + 1);
        let mynum = Number(value);
        //alert(value);

        ordinal_Array[value] = ordinal(n);

    }

    function ordinal(n) {
        let s = ["th", "st", "nd", "rd"];
        let v = n % 100;
        return n + (s[(v - 20) % 10] || s[v] || s[0]);
    }

    function num(x) {
        return x;
    }
</script>

</body>
</html>

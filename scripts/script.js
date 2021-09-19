function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    console.log(printContents);

    window.print();

    document.body.innerHTML = originalContents;
}
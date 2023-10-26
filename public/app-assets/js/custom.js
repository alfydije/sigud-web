function receiptTable(
    column1Params,
    column2Params,
    column3Params,
    column4Params
) {
    const widthColumn1 = 19;
    const widthColumn2 = 3;
    const widthColumn3 = 7;
    const widthColumn4 = 7;

    const column1 = wordwrap(column1Params, widthColumn1, "\n", true).split(
        "\n"
    );
    const column2 = wordwrap(column2Params, widthColumn2, "\n", true).split(
        "\n"
    );
    const column3 = wordwrap(column3Params, widthColumn3, "\n", true).split(
        "\n"
    );
    const column4 = wordwrap(column4Params, widthColumn4, "\n", true).split(
        "\n"
    );

    const highestWordLenght = Math.max(
        column1.length,
        column2.length,
        column3.length,
        column4.length
    );

    let results = [];
    for (let i = 0; i < highestWordLenght; i++) {
        const columnWithWidth1 = column1[i]
            ? column1[i].padEnd(widthColumn1)
            : "";
        const columnWithWidth2 = column2[i]
            ? column2[i].padEnd(widthColumn2)
            : "";
        const columnWithWidth3 = column3[i]
            ? column3[i].padStart(widthColumn3)
            : "";
        const columnWithWidth4 = column4[i]
            ? column4[i].padStart(widthColumn4)
            : "";

        results.push(
            `${columnWithWidth1} ${columnWithWidth2} ${columnWithWidth3} ${columnWithWidth4}`
        );
    }
    return results.join("\n") + "\n";
}

function wordwrap(str, width, brk, cut) {
    brk = brk || "\n";
    width = width || 75;
    cut = cut || false;

    if (!str) {
        return str;
    }

    var regex =
        ".{1," +
        width +
        "}(\\s|$)" +
        (cut ? "|.{" + width + "}|.+$" : "|\\S+?(\\s|$)");
    console.log("brk", str);
    return str.toString().match(RegExp(regex, "g")).join(brk);
}

"use strict";
function currency(angka, prefix) {
    if (angka.toString().includes("-")) {
        var number_string = angka.toString().replace(/[^,\d]/g, ""),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            var separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. -" + rupiah : "-";
    } else {
        var number_string = angka.toString().replace(/[^,\d]/g, ""),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            var separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
}


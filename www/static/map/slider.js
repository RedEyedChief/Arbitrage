 $(document).ready(function () {
          $("#factorWeight").slider(
          {
            min: 0,
            max: 100,
            step: 1,
            value: 50,
            change: showValueFactor,
            slide: showValueFactor,
            range: "min"
        });
          
          var maxDepth = getMax();
          $("#maxDepth").slider(
          {
            min: 2,
            max: maxDepth,
            step: 1,
            value: 50,
            change: showValueDepth,
            slide: showValueDepth,
            range: "min"
        });
          
          $("#update").click(function () {
              $("#slider").slider("option", "value", $("#seekTo").val());

          });
          function showValueFactor(event, ui) {
              $("#factorDistance").html(ui.value);
              $("#factorIncome").html(100 - ui.value);
          }
          
          function showValueDepth(event, ui) {
              $("#parameterDepth").html(ui.value);
          }
          
          function getMax()
          {
            console.log($("#parameterDepth").html())
            return $("#parameterDepth").html()
          }
      });
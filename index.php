<html>
  <head>
    <!-- Cardano Serialization Lib -->
    <!-- lib_bg -->
    <!-- <script
      type="module"
      src="https://cdn.jsdelivr.net/npm/@emurgo/cardano-serialization-lib-asmjs@9.1.2/cardano_serialization_lib_bg.min.js"
    ></script> -->
<!--     
    <script>
      type="module"
      src = "https://cdn.jsdelivr.net/npm/@emurgo/cardano-serialization-lib-browser@10.0.4/cardano_serialization_lib.js"
    </script> -->
    <!-- .asm -->
    <!-- <script
      type="module"
      src="https://cdn.jsdelivr.net/npm/@emurgo/cardano-serialization-lib-asmjs@9.1.2/cardano_serialization_lib.asm.min.js"
    ></script> -->
    <!-- <script
     type="module"
      src="./dist/cardano_serialization_lib_bg.wasm/"
    ></script> -->
  </head>
  <body>
    <script type="module">
      import * as wasm from "https://cdn.jsdelivr.net/npm/@emurgo/cardano-serialization-lib-asmjs@9.1.2/cardano_serialization_lib.min.js";
      function hexToBytes(hex) {
        for (var bytes = [], c = 0; c < hex.length; c += 2)
          bytes.push(parseInt(hex.substr(c, 2), 16));
        return bytes;
      }

      if(window.cardano.isEnabled()) {
        console.log("cardano is enabled");
      } else {
        console.log("cardano NOT is enabled");
      }

      function f() {
        window.cardano.enable().then((a) => {
          window.cardano.getBalance().then((res) => {
            const balance = wasm.Value.from_bytes(hexToBytes(res));
            const lovelaces = balance.coin().to_str();

            console.log("lovelaces : " + lovelaces);
          });
          window.cardano.getUsedAddresses().then((res) => {
            console.log("getUsedAddresses() : " + res);
          });
        });
      }
      setTimeout(f, 1000);

    </script>
  </body>
</html>

import ReactDOM from "react-dom";
import React from "react";
import Sale from "./components/Sale/Sale";



if (document.getElementById('sale-react')) {
    ReactDOM.render(<Sale />, document.getElementById('sale-react'));
}

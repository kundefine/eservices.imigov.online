import ReactDOM from "react-dom";
import React from "react";
import CreateCompany from "./components/Company/CreateCompany";

if (document.getElementById('company-react')) {
    ReactDOM.render(<CreateCompany />, document.getElementById('company-react'));
}

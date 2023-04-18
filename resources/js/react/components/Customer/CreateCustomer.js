import React, {useState} from "react";
import {v4 as uuidv4} from 'uuid';
import axios from "axios";
import Collapse from "../Collapse";


const CreateCustomer = ({storeCustomer}) => {
    const [customer, setCustomer] = useState({
        id: uuidv4(),
        name: "",
        email: "",
        address: ""
    });

    const restCustomer = () => {
        setCustomer({
            id: uuidv4(),
            name: "",
            email: "",
            address: ""
        })
    }


    const createCustomer = () => {
        let error = false;
        let errorMessage = "";
        if(!customer.name) {
            errorMessage +='Customer name is required\n';
            error = true;
        }
        if(!customer.email) {
            errorMessage +='Customer email is required\n';
            error = true;
        }
        if(!customer.address) {
            errorMessage +='Customer address is required\n';
            error = true;
        }
        if(error) {
            alert(errorMessage);
            return;
        }

        axios.post(window.customerCreateAjaxUrl, {customer: customer}).then((res) => {
            if(storeCustomer) {
                storeCustomer(res.data);
                restCustomer();
            }
        }).catch(err => console.log(err));



    }



    return (
        <Collapse heading="Create New Customer" show={false}>
            <div className="card-body">
                <div className="form-group">
                    <label htmlFor="name">Customer Name<span className="text-danger">*</span></label>
                    <input
                        type="text"
                        className={customer.name ? "form-control" : "form-control is-invalid"}
                        id="name"
                        value={customer.name} onChange={(e) => setCustomer(prevState => {return {...prevState, name: e.target.value}})}
                        placeholder="Customer Name"
                        autoComplete="nope"
                    />
                </div>
                <div className="form-group">
                    <label htmlFor="name">Customer Email<span className="text-danger">*</span></label>
                    <input
                        type="text"
                        className={customer.email ? "form-control" : "form-control is-invalid"}
                        id="address"
                        value={customer.email} onChange={(e) => setCustomer(prevState => {return {...prevState, email: e.target.value}})}
                        placeholder="Customer Email"
                        autoComplete="nope"
                    />
                </div>
                <div className="form-group">
                    <label htmlFor="address">Customer Address</label>
                    <textarea
                        className={customer.address ? "form-control" : "form-control is-invalid"}
                        id="address"
                        value={customer.address}
                        onChange={(e) => setCustomer(prevState => {return {...prevState, address: e.target.value}})}
                        placeholder="Customer Address"
                        autoComplete="nope"
                    >{customer.address}</textarea>
                </div>
            </div>
            <div className="card-footer">
                <div className="form-group clearfix mb-0">
                    <button type="button" className="btn btn-primary float-right" onClick={createCustomer}>Create Customer</button>
                </div>
            </div>
        </Collapse>
    )
}
export default CreateCustomer;

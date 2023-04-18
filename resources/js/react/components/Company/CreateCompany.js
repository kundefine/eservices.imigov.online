import React, {useState} from "react";
import {v4 as uuidv4} from 'uuid';
import FileUpload from "../FileUpload";
import axios from "axios";
import Collapse from "../Collapse";

const CreateCompany = ({storeCompany}) => {

    const [company, setCompany] = useState({
        id: uuidv4(),
        name: "",
        address: "",
        logo: [],
        water_mark: [],

    });

    const resetCompany = () => {
        setCompany({
            id: uuidv4(),
            name: "",
            address: "",
            water_mark: [],
            logo: []
        });
    }
    const createCompany = (e) => {
        e.preventDefault();
        let companyData = new FormData();
        companyData.append("name", company.name);
        companyData.append("address", company.address);
        if(company.logo.length) companyData.append("logo", company.logo[0]);
        if(company.water_mark.length) companyData.append("water_mark", company.water_mark[0])
        axios.post(companyStoreUrl, companyData).then(res => {
            if(storeCompany) {
                storeCompany(res.data);
            }
            resetCompany();
            alert('company has been created successfully');
        })
    }

    return (
        <form onSubmit={(e) => createCompany(e)} encType="multipart/form-data">
            <Collapse heading="Create New Company" show={false}>
                <div className="card-body">
                    <div className="form-group">
                        <label htmlFor="name">Name <span className="text-danger">*</span></label>
                        <input
                            id="name"
                            type="text"
                            className="form-control"
                            value={company.name}
                            autoComplete="nope"
                            onChange={(e) => setCompany(prevState => ({...prevState, name: e.target.value}))}
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="address">Address <span className="text-danger">*</span></label>
                        <textarea
                            id="address"
                            cols="30"
                            rows="3"
                            className="form-control"
                            autoComplete="nope"
                            onChange={(e) => setCompany(prevState => ({...prevState, address: e.target.value}))}
                            value={company.address}
                        >
                            {company.address}
                        </textarea>
                    </div>

                    <FileUpload
                        label="Logo"
                        name="logo"
                        value={(files) => setCompany(prevState => ({...prevState, logo: files}))}
                        syncState={company.logo}
                    />
                    <FileUpload
                        label="Water Mark"
                        name="water_mark"
                        value={(files) => setCompany(prevState => ({...prevState, water_mark: files}))}
                        syncState={company.water_mark}
                    />
                </div>
                <div className="card-footer clearfix mb-0">
                    {company.name && company.address ? <button type="submit" className="btn btn-primary btn-sm float-right">Create Company</button> : null}
                </div>
            </Collapse>

        </form>
    )
}

export default CreateCompany;
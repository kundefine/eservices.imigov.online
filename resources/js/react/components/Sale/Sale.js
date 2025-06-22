import React from "react";
import {v4 as uuidv4} from 'uuid';
import random from 'random-string-generator';
import './Sale.css';
import axios from "axios";
import FormStore from "../Form/FormStore";
import SaleInvoice from "./SaleInvoice";
import ReactToPrint from 'react-to-print';
import Loading from "../Loading";
import CreateCustomer from "../Customer/CreateCustomer";
import CreateCompany from "../Company/CreateCompany";
import Collapse from "../Collapse";


class Sale extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            sale: {
                id: uuidv4(),
                serial: random(5, 'numeric')
            },
            saleDetails: [],
            services: [],
            infoValue: [],
            serviceLoading: true,
            customerListLoading: true,
            companyListLoading: true,
            paymentMethodListLoading: true,
            printPreview: false,
            customer: {},
            customerList: [],
            company: {},
            companyList: [],
            payment: [],
            paymentMethodList: []
        }
    }




    componentDidMount() {
        axios.get(window.servicesAjaxUrl).then(res => this.setState((prevState) => {
            return {
                ...prevState,
                services: res.data,
                serviceLoading: false
            }
        }));

        axios.get(window.customerIndexAjaxUrl).then(res => this.setState((prevState) => {
            return {
                ...prevState,
                customerList: res.data,
                customerListLoading: false
            }
        }));

        axios.get(window.companyIndexAjaxUrl).then(res => this.setState((prevState) => {
            return {
                ...prevState,
                companyList: res.data,
                companyListLoading: false
            }
        }));

        axios.get(window.paymentMethodIndexAjaxUrl).then(res => this.setState((prevState) => {
            return {
                ...prevState,
                paymentMethodList: res.data,
                paymentMethodListLoading: false
            }
        }));

    }





    addService = (e) => {
        e.preventDefault();
        let {serviceId} = e.target.dataset;
        let service = this.state.services.filter(service => {
            return +serviceId === service.id;
        });
        let filterService = {
            id: uuidv4(),
            quantity: 1,
            price: 0,
            info: service[0],
        }
        this.setState(prevState => ({
            saleDetails : [...prevState.saleDetails, filterService]
        }))
    }
    setStore = (data) => {
        let found = false;
        if(this.state.infoValue.length) {
            for(let i = 0; i < this.state.infoValue.length; i++) {
                if(data.id === this.state.infoValue[i].id && data.value.id === this.state.infoValue[i].value.id) {
                    found = true;
                }
            }
        }
        if(found) {
            this.setState(prevState => {
                return {
                    ...prevState,
                    infoValue: prevState.infoValue.map(info => {
                        if(data.id === info.id && data.value.id === info.value.id) {
                            return data
                        } else {
                            return info;
                        }
                    })
                }
            })
            return;
        }
        this.setState(prevState => {
            return {
                ...prevState,
                infoValue: [...prevState.infoValue, data]
            }
        })
    }
    removeDetail = (e) => {
        this.setState(prevState => {
            return {
                ...prevState,
                saleDetails: prevState.saleDetails.filter(saleDetail => {
                    return saleDetail.id !== e.target.dataset.saleDetail
                }),
                infoValue: prevState.infoValue.filter(infoValue => {
                    return infoValue.id !== e.target.dataset.saleDetail
                })
            }
        })
    }
    updateQuantity = (e) => {
        this.setState(prevState => {
            let newSaleDetails = prevState.saleDetails.map(saleDetail => {
                if(saleDetail.id == e.target.dataset.saleDetailId) {
                    let newSaleDetail = {...saleDetail, quantity: +e.target.value};
                    return newSaleDetail
                }
                return saleDetail;
            });
            return {
                ...prevState,
                saleDetails: newSaleDetails
            }
        })
    }
    updatePrice = (e) => {
        this.setState(prevState => {
            let newSaleDetails = prevState.saleDetails.map(saleDetail => {
                if(saleDetail.id == e.target.dataset.saleDetailId) {
                    let newSaleDetail = {...saleDetail, price: +e.target.value};
                    return newSaleDetail
                }
                return saleDetail;
            });
            return {
                ...prevState,
                saleDetails: newSaleDetails
            }
        })
    }
    setCustomer = (e) => {
        this.setState(prevState => {
            return {
                customer: e.target.value
            }

        })
    }
    setCompany = (e) => {
        this.setState(prevState => {
            return {
                company: e.target.value
            }

        })
    }
    addCustomerList = (newCustomer) => {
        this.setState(prevState => {
            return {
                ...prevState,
                customerList: [...prevState.customerList, newCustomer],
                customer: JSON.stringify(newCustomer)
            }
        })
    }
    addCompanyList = (newCompany) => {
        console.log(newCompany)
        this.setState(prevState => {
            return {
                ...prevState,
                companyList: [...prevState.companyList, newCompany],
                company: JSON.stringify(newCompany)
            }
        })
    }


    render() {
        const {serial, id} = this.state.sale;
        const {
            saleDetails,
            serviceLoading,
            customerListLoading,
            customerList,
            customer,
            company,
            companyList,
            companyListLoading,
            paymentMethodListLoading,
            paymentMethodList
        } = this.state;

        return (


            <div className="">

                {/*Customer + Company + payment*/}
                <div className="row">

                    {/*Customer*/}
                    <div className="col-md-4">
                        <Loading loading={customerListLoading}>
                            <div className="card">
                                <div className="card-header">Select Customer</div>
                                <div className="card-body">
                                    <div className="form-group">
                                        <label htmlFor="">Select Customer</label>
                                        <select name="" id="" className="form-control" value={customer} onChange={(e) => this.setCustomer(e)}>
                                            <option value={JSON.stringify(company)}>Please Select One</option>
                                            {customerList.map(customer => <option value={JSON.stringify(customer)} key={customer.id}>{customer.name}</option>)}
                                        </select>
                                    </div>
                                    <CreateCustomer storeCustomer={this.addCustomerList} />
                                </div>
                            </div>
                        </Loading>
                    </div>

                    {/*Company*/}
                    <div className="col-md-4">
                        <Loading loading={companyListLoading}>
                            <div className="card">
                                <div className="card-header">Select Company</div>
                                <div className="card-body">
                                    <div className="form-group">
                                        <label htmlFor="">Select Company</label>
                                        <select name="" id="" className="form-control" value={company} onChange={(e) => this.setCompany(e)}>
                                            <option value={JSON.stringify(company)}>Please Select One</option>
                                            {companyList.map(company => <option value={JSON.stringify(company)} key={company.id}>{company.name}</option>)}
                                        </select>
                                    </div>
                                    <CreateCompany storeCompany={this.addCompanyList} />
                                </div>
                            </div>
                        </Loading>
                    </div>


                    {/*Payment*/}
                    <div className="col-md-4">
                        <Loading loading={paymentMethodListLoading}>
                            <div className="card">
                                <div className="card-header">Payment Info</div>
                                <div className="card-body">
                                    <div className="form-group">
                                        <label htmlFor="">Select Payment Method</label>
                                        <select name="" id="" className="form-control" value={null} onChange={(e) => this.setCompany(e)}>
                                            <option value={JSON.stringify(company)}>Please Select One</option>
                                            {paymentMethodList.map(paymentMethod => <option value={JSON.stringify(paymentMethod)} key={paymentMethod.id}>{paymentMethod.name}</option>)}
                                        </select>
                                    </div>
                                    <CreateCompany storeCompany={this.addCompanyList} />
                                </div>
                            </div>
                        </Loading>
                    </div>
                </div>



                {/*Sele Services*/}
                <div className="row mt-5">
                    <div className="col-md-12">
                        <Loading loading={serviceLoading}>
                            <div className="card">
                                <form action="" method="post">
                                    <div className="card-header bg-light">
                                        Sale Form
                                    </div>
                                    <div className="card-body">
                                        <div className="form-group">
                                            <label htmlFor="serial">Serial</label>
                                            <input type="text" name="serial" id="serial" className="form-control" value={serial} readOnly />
                                        </div>

                                        {saleDetails.map(saleDetail => {
                                            return (
                                                <div className="card mb-2" key={saleDetail.id}>
                                                    <div className="card-header py-0 px-3 d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <button type="button" className="btn btn-icon btn-outline btn-sm ml-2" data-toggle="collapse" data-target={`#collapseExample-${saleDetail.id}`} aria-expanded="false" aria-controls={`collapseExample-${saleDetail.id}`}>
                                                                <i className="fa fa-chevron-down"></i>
                                                            </button>
                                                            <button type="button" className="btn btn-icon btn-outline btn-sm ml-2">
                                                                <i className="fa fa-trash-o text-danger" onClick={(e) => this.removeDetail(e)} data-sale-detail={saleDetail.id}></i>
                                                            </button>
                                                        </div>
                                                        <table className="table">
                                                            <tbody>
                                                            <tr>
                                                                <td className="py-1">
                                                                    <div className="form-group">
                                                                        <label className="">Service Name</label>
                                                                        <div className="">
                                                                            <input type="text" name="quantity" className="form-control" defaultValue={saleDetail.info.name} disabled={true}/>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td className="py-1">
                                                                    <div className="form-group">
                                                                        <label className="">Quantity</label>
                                                                        <div className="">
                                                                            <input type="number" name="quantity" className="form-control" value={saleDetail.quantity} onChange={(e) => this.updateQuantity(e)} data-sale-detail-id={saleDetail.id} />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td className="py-1">
                                                                    <div className="form-group">
                                                                        <label className="">Price</label>
                                                                        <div className="">
                                                                            <input type="number" name="price" className="form-control" value={saleDetail.price} onChange={(e) => this.updatePrice(e)} data-sale-detail-id={saleDetail.id} />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td className="py-1">
                                                                    <div className="form-group">
                                                                        <div className="form-group">
                                                                            <label className="">Total Price</label>
                                                                            <div className="">
                                                                                <input type="text" name="quantity" className="form-control" value={(saleDetail.price * saleDetail.quantity).toFixed(2)} disabled={true}/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <div className="card-body collapse show" id={`collapseExample-${saleDetail.id}`}>
                                                        {saleDetail.info.form.content_json.map(form => <FormStore form={form} key={form.id} id={saleDetail.id} storer={this.setStore}/> )}
                                                    </div>
                                                </div>
                                            )
                                        })}
                                    </div>

                                    <div className="card-footer service-button">
                                        <div className="form-group clearfix mb-0">
                                            <div className="dropdown">
                                                <button className="btn p-0" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i className="fa fa-plus-circle"></i>
                                                </button>
                                                <div className="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                    {this.state.services.map(service => (
                                                        <a className="dropdown-item d-flex align-items-center" key={service.id}><span onClick={this.addService} data-service-id={service.id}>{service.name}</span></a>
                                                    ))}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </Loading>
                    </div>
                </div>


                {/*Invoice print preview*/}
                <div className="row mt-5">
                    <div className="col-md-12">
                        <div className={this.state.printPreview ? "print-preview active" : "print-preview" } >
                            <div className="card">
                                <button className="btn btn-icon my-0 mx-auto" onClick={() => this.setState(prevState => {return {printPreview: !prevState.printPreview}})}>
                                    <i className={this.state.printPreview ? "fa fa-arrow-down" : "fa fa-arrow-up" }></i>
                                </button>
                                <div className="card-header bg-light d-flex justify-content-between align-items-center">
                                    Invoice Preview
                                    <ReactToPrint
                                        trigger={() => {return <button className="btn btn-icon"><i className="fa fa-print"></i></button>}}
                                        content={() => this.componentRef}
                                    />
                                </div>
                                <SaleInvoice sale={this.state} ref={el => (this.componentRef = el)}/>
                                <div className="card-footer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default Sale;


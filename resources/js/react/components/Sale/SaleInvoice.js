import React from "react";
import moment from "moment";
import ReactDOM from "react-dom";
import './SaleInvoice.css';

class SaleInvoice extends React.Component{
    constructor(props) {
        super(props);
    }




    render() {
        let {sale, infoValue, saleDetails, customer: customerString, company:companyString} = this.props.sale;
        let customer = {};
        let company = {};

        if(Object.keys(customerString).length > 0) {
            customer = JSON.parse(customerString);
        }
        if(Object.keys(companyString).length > 0) {
            company = JSON.parse(companyString);
        }
        let waterMark = {
            position: 'fixed',
            top: "50%",
            left: "50%",
            transform: "translate(-50%, -50%)"
        };
        if(Object.keys(companyString).length > 0) {
            waterMark = {
                backgroundImage: `url("${company.water_mark_url}")`,
                position: 'fixed',
                top: "50%",
                left: "50%",
                transform: "translate(-50%, -50%) rotate(-45deg)",
                width: "300px",
                height: "120px",
                opacity: "0.15",
                zIndex: "9999999",
                backgroundSize: "contain",
                backgroundRepeat : "no-repeat"
            }
        }

        return (
            <div>
                {
                    Object.keys(company).length > 0 ?
                    <div className="print-page-header">
                        <div className="row align-items-center mb-5">
                            <div className="col-md-6">
                                <img src={company.logo_url} alt=""/>
                            </div>
                            <div className="col-md-6">
                                <h3 className="text-right">{company.name}</h3>
                                <p className="text-right">{company.address}</p>
                            </div>
                        </div>
                    </div> : null
                }


                <div className="water-mark" style={waterMark}></div>

                <div className="card-body print-page-body" style={{minHeight: "100vh"}}>
                    <div className="row">
                        <div className="col-md-6">
                            <div className="float-left">
                                <h5>Invoice Info</h5>
                                <div className="dropdown-divider"></div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <th>Id:</th>
                                        <td>{sale.id}</td>
                                    </tr>
                                    <tr>
                                        <th>Date:</th>
                                        <td>{moment().format("MM-DD-YYYY")}</td>
                                    </tr>

                                    <tr>
                                        <th>Serial:</th>
                                        <td>#{sale.serial}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div className="col-md-6">
                            <div className="float-right">
                                <h5>Customer Info</h5>
                                <div className="dropdown-divider"></div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <th>Id:</th>
                                        <td>{customer.id}</td>
                                    </tr>
                                    <tr>
                                        <th>Name:</th>
                                        <td>{customer.name}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{customer.email}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{customer.address}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div className="dropdown-divider"></div>

                    <div className="row">
                        <div className="col-md-12">
                            <table className="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Service Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>

                                <tbody>
                                {saleDetails.map(saleDetail => {
                                    return (
                                        <tr key={saleDetail.id}>
                                            <td>
                                                <div className="card">
                                                    <div className="card-header">{saleDetail.info.name}</div>
                                                    <div className="card-body py-2">
                                                        {infoValue.filter(info => {
                                                            return saleDetail.id == info.id
                                                        }).map(info => {
                                                            return (
                                                                <div key={info.value.id}><strong>{info.value.label}: </strong> {info.value.value}</div>
                                                            )
                                                        })}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{saleDetail.quantity}</td>
                                            <td>{saleDetail.price}</td>
                                            <td>{(saleDetail.price * saleDetail.quantity).toFixed(2)}</td>
                                        </tr>
                                    )
                                })}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colSpan="3" className="text-right">Total: </th>
                                    <td>{saleDetails ? saleDetails.reduce((sum, saleDetail)=>{return sum += saleDetail.price * saleDetail.quantity;}, 0).toFixed(2) : 0}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        )
    }
}

export default SaleInvoice;
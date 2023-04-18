import React, {Component} from "react";

export default class Loading extends Component {
    render() {
        let {loading} = this.props;
        if(loading) return (
            <div className="loading">
                <img src="https://media0.giphy.com/media/52qtwCtj9OLTi/giphy.gif?cid=ecf05e4790mphysobmm95hmi2eslerxjbp1nhcl4e2l3ogp2&rid=giphy.gif&ct=g" alt=""/>
            </div>
        );

        return this.props.children;
    }
}
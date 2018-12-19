/*    --------------------------- Comment Block ------------------------------------
      |  Component: Previous Transactions
      |
      |  Purpose:  Component for the purpose of displaying history of
      |       all transactions made by users. This list of transactions
      |       contains all transactions with Confirm/Cancelled/Pending status.
      |
      *-------------------------------------------------------------------*/
import React, {Component} from 'react'
import {Link} from 'react-router-dom'
import logo from '../../logo.png'
import '../../styles/user/transaction-history.css'
import NavBar from '../../components/navbar'
import Parse from 'parse'
import {connect} from 'react-redux';
import {bindActionCreators} from 'redux';
import {logIn} from "../../actions/index";

class TransactionHistory extends Component {
  /*    This function helps us to make our Navigation Bar responsive to
        changes of width when the user resizes the browser.
  */
  navbarResponsive() {
    let x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  /*    Component's constructor for initializing settings.
          This data includes initializing Parse-server
          requirements and binding component to different functions.
    */
  constructor(props) {
    super(props);
    Parse.initialize("myAppId123456", '1xoWtDkxw8oZvX3bzhdTuHU7KZB8SGZD9jWQ2V9p');
    Parse.serverURL = 'http://localhost:8030/wp';
    this.getDataFromServer = this.getDataFromServer.bind(this);
    this.state = {
      commodities: []
    }
  }
  componentDidMount() {
    this.getDataFromServer();
    this.props.logIn('employer')
  }

  /*    Component's function, invoked after component's mounting,
          to fetch required data from the database, data needed for
          our different queries based on employee's requests.
    */
  async getDataFromServer() {
    let currentUser = Parse.User.current();
    const Commodities = Parse.Object.extend("Commodities");
    let query = new Parse.Query(Commodities);
    query.notEqualTo("Type", "Company Charge")
    const results = await query.find();
    for (var i = 0; i < results.length; i++) {
      results[i] = [
        results[i].get('Type'),
        results[i].id,
        results[i].createdAt,
        results[i].get('Price'),
        results[i].get('User'),
        results[i].get('CommName')
      ];
    }
    this.setState({commodities: results})
  }
  /*    Render function of our Component to display required HTML code.
          This component is available in every component; it renders
          proper HTML code based on the component's state.
    */
  render() {
    return (<div>
      <NavBar/>
      <div className="content">

        <div className="headPic"></div>

        <div className="table_container">
          <table>
            <caption style={{
                color: "white",
                paddingBottom: "20px"
              }}>User Transactions</caption>
            <thead>
              <tr>
                <th>Commodity Type</th>
                <th>Commodity Code</th>
                <th>Date Created</th>
                <th>Price</th>
                <th>Username</th>
                <th>Commodity Name</th>
              </tr>
            </thead>
            <tbody>
              {
                this.state.commodities.map((value, i) => <tr key={i}>
                  <td>{value[0]}</td>
                  <td>{value[1]}</td>
                  <td>{value[2].toLocaleString()}</td>
                  <td>{value[3]}</td>
                  <td>{value[4].toLocaleString()}</td>
                  <td>{value[5].toLocaleString()}</td>
                </tr>)
              }
            </tbody>
          </table>
        </div>

      </div>

    </div>)
  }
}
function mapDispatchToProps(dispatch) {
    return {logIn: bindActionCreators(logIn, dispatch)}
}

export default connect(null, mapDispatchToProps)(TransactionHistory)

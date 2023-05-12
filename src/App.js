import React from 'react';
import './App.css';
import HomeScreen from './screens/HomeScreen';
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import LoginScreen from './screens/LoginScreen';

function App() {
  const user = null;
  
  return (
    <div className="app">
        <Router>
        <Routes>
          {!user ? (
            <Route exact path="/" element={<LoginScreen />} />
          ) : (
           <Route exact path="/home" element={<HomeScreen />} />


          )}
        

          {/* <Route exact path="/register" element={<Register />} />
          <Route exact path="/reset" element={<Reset />} />
          <Route exact path="/feed" element={<Feed />} /> */}
        </Routes>
      </Router>
    </div>
  );
}

export default App;

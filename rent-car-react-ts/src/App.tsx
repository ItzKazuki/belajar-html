import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./pages/Home";
import Cars from "./pages/Cars";
import NotFound from "./pages/notFound";
import Register from "./pages/Register";
import Login from "./pages/Login";
import Car from "./pages/Car";
import Logout from "./pages/Logout";

export default function App() {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/cars" element={<Cars />} />
                <Route path="/register" element={<Register />} />
                <Route path="/login" element={<Login />} />
                <Route path="/logout" element={<Logout />} />
                <Route path="/car/info/:id" element={<Car />} />
                <Route path="*" element={<NotFound />} />
            </Routes>
        </Router>
    );
}
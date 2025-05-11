import { Link, useLocation } from "react-router-dom";
import { Drawer, IconButton } from "@mui/material";
import ShoppingCartIcon from "@mui/icons-material/ShoppingCart";
import Cart from "./cart.tsx";
import { useState } from "react";

const NavBar = () => {
  const location = useLocation();
  const [cartOpen, setCartOpen] = useState(false);

  const linkClass = (path: string) =>
    `btn ${location.pathname === path ? "btn-danger" : "btn-primary"}`;

  return (
    <div className="bg-warning text-white p-4 navbar">
      <div className="container">
        <div className="row align-items-center">
          <div className="col">
            <Link to="/" className={linkClass("/")}>
              All
            </Link>
          </div>
          <div className="col">
            <Link to="/tech" className={linkClass("/tech")}>
              Tech
            </Link>
          </div>
          <div className="col">
            <Link to="/clothes" className={linkClass("/clothes")}>
              Clothes
            </Link>
          </div>
          <div className="col-auto">
            <IconButton onClick={() => setCartOpen(true)} color="inherit">
              <ShoppingCartIcon />
            </IconButton>
          </div>
        </div>
      </div>

      <Drawer anchor="right" open={cartOpen} onClose={() => setCartOpen(false)}>
        <Cart></Cart>
      </Drawer>
    </div>
  );
};

export default NavBar;

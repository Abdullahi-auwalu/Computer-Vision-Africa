"use client";
import { AiOutlineMenu, AiOutlineClose } from "react-icons/ai";

import Image from "next/image";
import Link from "next/link";
import { useState } from "react";

const Navbar = () => {
  const [sideNav, setSideNav] = useState(false);
  return (
    <div className="w-full h-[116px] flex items-center justify-between pr-6 lg:px-[80px] bg-white shadow-lg shadow-gray-300/50 ">
      <Image
        src="/Logo.png"
        alt=""
        width={150}
        height={150}
        className="w-[9rem] md:w-[10rem] overflow-hidden -px-4"
      />
      <div className="flex items-center justify-between gap-16 overflow-hidden">
        <ul className="md:flex items-center justify-around gap-20 hidden w-auto">
          <li className="hover:text-[#437D58] text-2xl font-semibold active:">
            <Link href="/">Home</Link>
          </li>
          <li className="hover:text-[#437D58] text-2xl font-semibold active:text-[#437D58]">
            <Link href="/about">About</Link>
          </li>
          <li className="hover:text-[#437D58] text-2xl font-semibold">
            <Link href="/events">Events</Link>
          </li>
          <li className="hover:text-[#437D58] text-2xl font-semibold">
            <Link href="/events">Contact</Link>
          </li>
        </ul>
        <div className="md:flex items-center justify-center w-[148px] h-[50px] p-2 bg-[#205021] hover:bg-[#205021] text-white text-xl hidden font-semibold rounded-sm">
          <Link href="/contact">Donate</Link>
        </div>
        <div
          onClick={() => setSideNav(!sideNav)}
          className="cursor-pointer md:hidden"
        >
          <AiOutlineMenu size={35} className="text-[#205021]" />
        </div>
        {sideNav ? (
          <div
            className="bg-black/60 fixed w-full h-screen right-0 top-0 z-10"
            onClick={() => setSideNav(!sideNav)}
          ></div>
        ) : (
          ""
        )}
        <div
          className={
            sideNav
              ? "fixed top-0 left-0 w-[300px] h-screen bg-gray-100 z-10 duration-300 "
              : "fixed top-0 left-[-999px] w-[300px] h-screen bg-gray-100 z-10  duration-300 "
          }
        >
          <div className="w-full h-[50px] bg-[#205021]">
            <AiOutlineClose
              onClick={() => setSideNav(!sideNav)}
              size={35}
              className="absolute right-4 top-3 cursor-pointer text-[#fff] items-center flex"
            />
          </div>
          <div className="mt-14">
            <ul className="flex flex-col items-center justify-around gap-4  w-auto">
              <li className="text-[#205021] text-3xl w-full h-[50px] flex items-center justify-center hover:bg-[#205021] hover:text-white ">
                <Link href="/">Home</Link>
              </li>
              <li className="text-[#205021] text-3xl w-full h-[50px] flex items-center justify-center hover:bg-[#205021] hover:text-white ">
                <Link href="/about">About</Link>
              </li>
              <li className="text-[#205021] text-3xl w-full h-[50px] flex items-center justify-center hover:bg-[#205021] hover:text-white ">
                <Link href="/events">Events</Link>
              </li>
              <li className="text-[#205021] text-3xl w-full h-[50px] flex items-center justify-center hover:bg-[#205021] hover:text-white ">
                <Link href="/contact">Contact</Link>
              </li>
              <li className="text-[#205021] text-3xl w-full h-[50px] flex items-center justify-center hover:bg-[#205021] hover:text-white ">
                <Link href="/contact">Support Us</Link>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Navbar;

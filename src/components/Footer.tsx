import Image from "next/image";
import Link from "next/link";

const Footer = () => {
  return (
    <div className="flex flex-col justify-between w-full md:h-[386px] bg-[#131313] ">
      <div className="flex flex-col md:flex-row items-center justify-between pt-10 px-6 lg:px-[80px] gap-10 md:gap-0">
        {/* LOGO */}
        <div className="flex flex-col gap-4 mt-8">
          <div className="w-[100px] h-[100px] bg-white rounded-full flex items-center justify-center">
            <Image
              src="/eye.png"
              alt=""
              width={200}
              height={200}
              className=""
            />
          </div>

          <div className=" flex flex-col items-center justify-center">
            <span className="text-white text-xl">Computer</span>
            <span className="text-white text-xl">Vision</span>
            <span className="text-white text-xl">Africa</span>
          </div>
        </div>

        {/* SOCIALS  */}
        <div className="flex flex-col gap-8 md:-mt-16 item-center justify-center">
          <h3 className="text-white text-2xl font-semibold">Socials</h3>
          <div className="flex flex-col items-center md:flex-row gap-6">
            <Link href="https://buff.ly/3Ag5dif">
              <Image
                src="/facebook.png"
                alt=""
                width={30}
                height={30}
                className="w-[25px] md:w-[30px] h-[25px] md:h-[30px]"
              />
            </Link>
            <Link href="https://buff.ly/4dXXuDx">
              <Image
                src="/x.png"
                alt=""
                width={30}
                height={30}
                className="w-[25px] md:w-[30px] h-[25px] md:h-[30px]"
              />
            </Link>
            <Link href="https://buff.ly/3YwhfgL">
              <Image
                src="/instagram.png"
                alt=""
                width={30}
                height={30}
                className="w-[25px] md:w-[30px] h-[25px] md:h-[30px]"
              />
            </Link>
            <Link href="https://buff.ly/4ePoRRf">
              <Image
                src="/linkedin.png"
                alt=""
                width={30}
                height={30}
                className="w-[25px] md:w-[30px] h-[25px] md:h-[30px]"
              />
            </Link>
            <Link href="https://chat.whatsapp.com/H9lhcqThokNIyXsy0HyySO">
              <Image
                src="/whatsapp.png"
                alt=""
                width={30}
                height={30}
                className="w-[25px] md:w-[30px] h-[25px] md:h-[30px]"
              />
            </Link>
          </div>
        </div>

        {/* LINKs */}
        <div className="flex flex-col gap-4 md:mt-4 items-center justify-center">
          <h3 className="text-white text-2xl font-semibold">Links</h3>
          <div className="flex flex-col gap-4 text-white text-base">
            <Link href="/">Home</Link>
            <Link href="/about">About</Link>
            <Link href="/event">Events</Link>
            <Link href="/contact">Contact</Link>
          </div>
        </div>
      </div>
      <div className="w-full h-[50px] -mt-5 bg-white flex items-center justify-end text-base pr-4 font-semibold ">
        <p>All right reserved</p>
      </div>
    </div>
  );
};

export default Footer;

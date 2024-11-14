import Image from "next/image";
import Link from "next/link";

const page = () => {
  return (
    <div className="py-[50px] bg-gray-100 px-4 lg:px-[130px]">
      <h1 className="text-3xl font-bold text-center py-10">Contact Us</h1>
      <div className="flex  my-12 bg-white shadow-lg shadow-gray-300/50 flex-col md:flex-row w-full rounded-md">
        <div className="flex flex-col md:w-[491px] md:h-auto bg-[#6DA480] gap-8 text-wrap justify-between py-12 px-10 rounded-md relative">
          <h2 className="text-2xl font-semibold text-white">
            Contact Information
          </h2>

          <div className="flex flex-col gap-10">
            <div className="flex items-center gap-4">
              <Image src="/phone.png" alt="" width={20} height={20} />
              <span className="text-white">+234 8126 245 301</span>
            </div>
            <div className="flex gap-4">
              <Image src="/email.png" alt="" width={20} height={20} />
              <span className="text-white">comptervisionafrica@gmail.com</span>
            </div>
          </div>
          <div className="flex gap-6">
            <Link href="https://buff.ly/4dXXuDx">
              <Image src="/twiterRound.png" alt="" width={30} height={30} />
            </Link>

            <div className="">
              <Link href="https://buff.ly/3YwhfgL">
                <Image
                  src="/instaRound.png"
                  alt=""
                  width={30}
                  height={30}
                  className="reletiv"
                />
              </Link>
              <Image
                src="/handClick.png"
                alt=""
                width={25}
                height={25}
                className=" absolute -mt-1 ml-3"
              />
            </div>
            <Link href="https://chat.whatsapp.com/H9lhcqThokNIyXsy0HyySO">
              <Image src="/discordRound.png" alt="" width={30} height={30} />
            </Link>
          </div>

          <div className="w-[138px] h-[138px] rounded-full bg-[#A9D4B880] absolute bottom-[5rem] right-[5rem] hidden md:flex "></div>
          <Image
            src="/halfCircle.png"
            alt=""
            width={200}
            height={200}
            className="absolute bottom-0 right-0 hidden md:flex "
          />
        </div>
        <div className="p-12">
          <form action="" className="flex flex-col">
            <div className=" flex flex-col gap-2 lg:flex-row flex-wrap md:gap-8 items-center justify-center">
              <div className="pb-8 ">
                <label htmlFor="" className="font-semibold">
                  First Name
                </label>
                <input
                  type="text"
                  placeholder="John"
                  className="lg:w-[278px] h-[30px] flex flex-col border-b border-[#6DA480] px-2"
                />
              </div>
              <div className="pb-8 flex flex-col gap-2">
                <label htmlFor="" className="font-semibold">
                  Last Name
                </label>
                <input
                  type="text"
                  placeholder="Deo"
                  className="lg:w-[278px] h-[30px] flex flex-col border-b border-[#6DA480] px-2"
                />
              </div>
            </div>
            <div className="flex flex-col pb-8 lg:flex-row flex-wrap md:gap-8 items-center justify-center">
              <div className="flex flex-col gap-2 pb-8 md:pb-0">
                <label htmlFor="" className="font-semibold">
                  Email
                </label>
                <input
                  type="text"
                  placeholder="abc@gmail.com"
                  className="lg:w-[278px] h-[30px] flex flex-col border-b border-[#6DA480] px-2"
                />
              </div>
              <div className="flex flex-col gap-2">
                <label htmlFor="" className="font-semibold">
                  Phone Number
                </label>

                <div className="flex">
                  <input
                    type="text"
                    placeholder="+234 *** **** ***"
                    className="lg:w-[278px] h-[30px] flex flex-col border-b border-[#6DA480] px-2"
                  />
                  <Image
                    src="/handClikBlack.png"
                    alt=""
                    width={20}
                    height={20}
                    className="-ml-10 mt-6 hidden lg:flex"
                  />
                </div>
              </div>
            </div>
            <div className="">
              <div className=" mt-6 lg:mt-[150px]">
                <label htmlFor="" className="font-semibold">
                  Message
                </label>
                <input
                  type="text"
                  placeholder="Write your message.."
                  className="w-full h-[55px] flex flex-col border-b border-[#6DA480] px-2 text-[#6DA480] "
                />
              </div>
            </div>
            <div className="flex lg:w-full justify-end">
              <button className=" w-[212px] lg:w-[250px] flex mt-8 items-center justify-center text-white font-semibold text-xl bg-[#6DA480] py-4  rounded-md">
                Send Message
              </button>
            </div>

            <div className=" w-full  hidden lg:flex justify-end pr-[100px]">
              <Image
                src="/letterSend.png"
                alt=""
                width={200}
                height={200}
                className="  justify-end"
              />
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};

export default page;

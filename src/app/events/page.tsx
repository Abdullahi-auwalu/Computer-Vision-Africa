import Image from "next/image";

const page = () => {
  return (
    <div className="w-full h-auto px-[130px] mt-20">
      {/* UPCOMING EVENTS */}
      <div className="flex flex-col gap-8 mb-24">
        <h2 className=" text-3xl font-semibold">Upcoming Events</h2>
        <div className="flex gap-8">
          <div className="flex gap-4 w-[591px] h-[375px] border-2 border-[#437D58]">
            <div className="p-4">
              <Image src="/event.png" alt="" width={240} height={240} />
            </div>
            <div className="flex flex-col gap-4 item-center justify-center">
              <h3 className="text-3xl font-semibold">Python Bootcamp</h3>
              <span className="font-thin">Oct 20, 2024</span>
            </div>
          </div>
          <div className="flex gap-4 w-[591px] h-[375px] border-2 border-[#437D58]">
            <div className="p-4">
              <Image src="/event.png" alt="" width={240} height={240} />
            </div>
            <div className="flex flex-col gap-4 item-center justify-center">
              <h3 className="text-3xl font-semibold">Python Bootcamp</h3>
              <span className="font-thin">Oct 20, 2024</span>
            </div>
          </div>
        </div>
      </div>

      {/* PAST EVENT */}
      <div className="flex flex-col gap-8 mb-24">
        <h2 className=" text-3xl font-semibold">Past Events</h2>
        <div className="flex gap-8">
          <div className="flex gap-4 w-[591px] h-[375px] border-2 border-[#437D58]">
            <div className="p-4">
              <Image src="/event.png" alt="" width={240} height={240} />
            </div>
            <div className="flex flex-col gap-4 item-center justify-center">
              <h3 className="text-3xl font-semibold">Python Bootcamp</h3>
              <span className="font-thin">Oct 20, 2024</span>
            </div>
          </div>
          <div className="flex gap-4 w-[591px] h-[375px] border-2 border-[#437D58]">
            <div className="p-4">
              <Image src="/event.png" alt="" width={240} height={240} />
            </div>
            <div className="flex flex-col gap-4 item-center justify-center">
              <h3 className="text-3xl font-semibold">Python Bootcamp</h3>
              <span className="font-thin">Oct 20, 2024</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default page;

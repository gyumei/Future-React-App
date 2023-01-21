import React from "react";
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm, useState } from '@inertiajs/inertia-react';
import Authenticated from "@/Layouts/AuthenticatedLayout";
import './css/Index.css';
import './css/All.css';
import moment from 'moment'

const Index = (props) => {
    const { futures } = props;
    const { me } = props;
    {/* form登録searchの設定 */}
    const {data, setData, post} = useForm({
        search: "",
    });
    {/* post設定 */}
    const handleSendPosts = (e) => {
        e.preventDefault();
        post("/future/search");
    }
    
    const numbers = Number(futures.links.length);
    {/* 現在時刻の取得 */}
    const now = moment()

    return (
        <html>
            <body>
                <div className="first_header">
                    <nav className="header01-nav">
                        <h1 className="header01-logo">タイムカプセル</h1>
                        {props.auth.user ? (
                        <ul className="header01-list">
                            <li className="header01-item"><Link href={`future/register`}><div className="header01">post</div></Link></li>
                            <li className="header01-item"><Link href={`/future/followed/display`}><div className="header02">Follower</div></Link></li>
                            <li className="header01-item"><Link href={`/future/following/display`}><div className="header03">Follow</div></Link></li>
                            <li className="header01-item"><Link href={`/future/mypage/${me}`}><div className="header04">mypage</div></Link></li>
                            <li className="header01-item"><Link href={`/future/share`}><div className="header06">share</div></Link></li>
                            <li className="header01-item"><Link href={`/future/outline`}><div className="header01">outline</div></Link></li>
                            <li className="header01-item"><div class="header05">
                                <Link href={route('logout')} method="post" as="button">
                                            Log Out
                                        </Link>
                                </div>
                            </li>
                        </ul>
                    ) : (
                        <>
                        <ul className="header01-list">
                            <li className="header01-item"><Link href={route('login')}><div class="header02">login</div></Link></li>
                            <li className="header01-item"><a href="/auth/redirect"><div class="header01"> Google login</div></a></li>
                            <li className="header01-item"><Link href={route('register')}><div class="header03">Register</div></Link></li>
                        </ul>
                        </>
                    )}
                            
                    </nav>
                </div>
                {/* タイトルの */}
                <div className="title-index">memories to the future</div>

    <div class="wrapper">
      <div class="hero">
        <div class="hero__inner">
          <ul class="hero-slide">
            <li class="hero-slide__item">
              <img class="hero-slide__img" src="{{ asset('./sunset.jpg') }}" alt="konn" />
            </li>
            <li class="hero-slide__item">
              <img class="hero-slide__img" src="img/index-hero02.jpg" alt="" />
            </li>
            <li class="hero-slide__item">
              <img class="hero-slide__img" src="img/index-hero03.jpg" alt="" />
            </li>
          </ul>
          <div class="hero__heading">
            <div class="hero__title">SLIDESHOW ANIMATION</div>
          </div>
        </div>
      </div>
    </div>
                <div className="user-form"> 
                    <form onSubmit={handleSendPosts}>
                        <div>
                            <h2>ユーザ検索</h2>
                            <input type="text" placeholder="検索" onChange={(e) => setData("search", e.target.value)}/>
                            <button className="mt-2 text-sm hover:text-gray-800" type="submit">検索</button>
                            <span className="text-red-600">{props.errors.search}</span>
                        </div>
                    </form>
                </div>
                
                <div className="content-index">
                    <div className="post-list">
                        { futures.data.map((future) => (
                        <>
                        <div key={future.id}>
                            { moment(future.year).isAfter(now) ? (
                            <div className="sample_box_title">
                                <div>個人のタイムカプセル</div>
                                <p className="data_text">{ future.username }さんが{ future.year }に向けて投稿した思い出です。</p>
                            </div>
                            ):(
                            <div className="sample_box_title">
                                <Link href={`/future/ownpage/${future.id}`} >タイムカプセル</Link>
                                <p>{ future.username }さんが{ future.year }に向けて投稿した思い出です。</p>
                            </div>
                            )
                            }
                        </div>
                        </> 
                        ))}
                    </div>
                </div>
                <div className='paginate'>
                { futures.links.map((links) => (
                    <>
                    {
                    (()=> {
                        {/* 最初と最後に出てくる不要な文字の削除 */}
                        if(links.label == "&laquo; Previous" || links.label == "Next &raquo;") {
                        }
                        else {
                        {/* リンクラベルの描画 */}
                        return (
                            <div className="paginate-link">
                                <p><Link href={`/future?page=${Number(links.label)}`} >{ links.label }</Link></p>
                            </div>
                         )}})()}
                        </>
                        )
                      )
                    }
                </div>
            </body>
        </html>
    );
}

export default Index;
import app from 'flarum/app';
import User from 'flarum/models/User';
import Model from 'flarum/Model';
import addLoginButton from './components/addLoginButton';
import addNotificationMethod from './components/addNotificationMethod';

app.initializers.add('flarum-telegram', () => {
    User.prototype.canReceiveTelegramNotifications = Model.attribute('canReceiveTelegramNotifications');
    User.prototype.flagrowTelegramError = Model.attribute('flagrowTelegramError');

    addLoginButton();
    addNotificationMethod();
});
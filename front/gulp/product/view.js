'use strict';

const model = '/product/';
const action = 'view';

const templatePath = '../views/' + model;
const phpFiles = './app/views/' + model + action + '/*.php';

import * as templateFile from '../tasks/template.js';

exports.build = () => {
    templateFile.template(phpFiles, templatePath)
};


